<template>
<div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#id</th>
      <th scope="col">number</th>
      <th scope="col">name</th>
      <th scope="col">status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(phone,index)  in phones.data">
      <th scope="row">{{phone.id}}</th>
      <td>{{phone.number}}</td>
      <td>{{phone.name}}</td>
      <td>{{(phone.status==1)?'active':'not active'}}</td>
      <td>
       
       <li  @click="do_call(phone.id,index)">
        call  <fa  :icon="['fas', 'phone-square']"   :mask="['fas', 'circle']"  :class="[ phone.action==null ? 'green' : (phone.action.status_action_phones_id == 0)? 'green': 'red']"/> 
      </li>
      <li  @click="showModal(phone.id,index,phone.number)">
        add note  <fa :icon="['fas', 'text-height']"    />
        </li>

      <li  @click="add_to_desactive(phone.id,index)" v-if="(phone.status==1)" >
        <fa :icon="['fas', 'times-circle']"   :class="{'red':true}"  /> 
         add to Des Active 
      </li>

       <li  @click="add_to_active(phone.id,index)" v-else >
        <fa :icon="['fas', 'times-circle']"   :class="{'green':true}"  /> 
         add to Active 
      </li>
      
      </td>
    </tr>
  </tbody>
</table>
<pagination :data="phones" @pagination-change-page="getResults" ></pagination>
    <modal :title="phoneNumber" :is-small="false" v-if="isModalVisible" @close="closeModal" :phoneId="phoneId" :indexColumn="indexColumn" >
    </modal>
</div>
</template>





<script>
const axios = require('axios').default;
import Modal from '../../components/Modal.vue';
export default {
  middleware: 'auth',
   components: {
      Modal,
    },
  data() {
    return {
     phones:{} ,
     isModalVisible: false,
     phoneId:1,
     indexColumn:1,
     phoneNumber:""
    }
  },
  mounted() {
   this.getResults();
  },
  methods: {
    getResults(page = 1) {
			axios.get('/api/phones/achieved?page=' + page)
				.then(response => {
					 this.phones = response.data.data;
				}).catch(function (error) {
            // handle error
              console.log(error);
          })
          .finally(function () {
            // always executed
      });
		},

    do_call(id,index){

      axios.get('api/phones/add_action_call/'+id)
      .then(response =>{
        this.phones.data[index].action =response.data;
      }).catch(function (error) {
          // handle error
            console.log(error);
        })
        .finally(function () {
          // always executed
        });
        console.log("index",index);
        console.log("index",id);
    
    },
      showModal(id,index,phoneNumber) {
        this.phoneNumber=phoneNumber;
        this.phoneId=id;
        this.indexColumn=index;
        this.isModalVisible = true;
      },

      closeModal() {
        this.isModalVisible = false;
      },


      add_to_active(id,index){

        axios.get('/api/phones/active/'+id)
        .then(response =>{
       
        	this.phones.data[index].status = response.data.data.status;
        }).catch(function (error) {
            // handle error
              console.log(error);
          })
          .finally(function () {
            // always executed
          });
    },

    add_to_desactive(id,index){

        axios.get('/api/phones/desactive/'+id)
        .then(response =>{
        
        	 this.phones.data[index].status = response.data.data.status;
        }).catch(function (error) {
            // handle error
              console.log(error);
          })
          .finally(function () {
            // always executed
          });
    },


  },computed: {
      
  },

}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
.red{
  color:red;
}
.green{
  color:green;
}
</style>
