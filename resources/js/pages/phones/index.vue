<template>
<div>
<pulse-loader :loading="loading" :color="color" :height="40" :class='{"loader-center":true}'  :size="size"  :id="'fisrt_loader'" ></pulse-loader>
<pulse-loader :loading="loading" :color="color" :height="40" :class='{"loader-center-secound":true}'  :size="size"  :id="'secound_loader'"></pulse-loader>


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
         <fa  :icon="['fas', 'phone-square']"   :mask="['fas', 'circle']"  :class="[ phone.action==null ? 'green' : (phone.action.status_action_phones_id == 0)? 'green': 'red']"/>  call
      </li>
      <li  @click="showModal(phone.id,index,phone.number)">
       <fa :icon="['fas', 'text-height']"    />  add note  
      </li>

      <li  @click="add_to_desactive(phone.id,index)"  >
        <fa :icon="['fas', 'times-circle']"   :class="{'red':true}" /> 
         add to Des Active 
      </li>

       
      
      </td>
    </tr>
  </tbody>
</table>
<div class="row">
 <div class="col-12">
    <pagination :data="phones" @pagination-change-page="getResults" :show-disabled='true' align='center' size="small" :limit="5" ></pagination>
  </div >
</div>  



<modal :title="phoneNumber" is-small='false' v-if="isModalVisible" @close="closeModal" :phoneId="phoneId" :indexColumn="indexColumn" >
    </modal>
</div>
</template>





<script>
const axios = require('axios').default;
import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min.js';

import Modal from '../../components/Modal.vue';
export default {
  middleware: 'auth',
   components: {
      Modal,
      PulseLoader
    },
  data() {
    return {
     phones:{} ,
     isModalVisible: false,
     phoneId:1,
     indexColumn:1,
     phoneNumber:"",
     loading:false,
     color: '#00ab00',
     size:'60px'
    }
  },
  mounted() {
   this.getResults();
   
  },
  methods: {
    getResults(page = 1) {
      this.loading=true;
			axios.get('api/phones?page=' + page)
				.then(response => {
					 this.phones = response.data.data;
           this.loading=false;
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
      
      

    add_to_desactive(id,index){

        axios.get('api/phones/desactive/'+id)
        .then(response =>{
        //  delete  this.phones.data[index] ;
         this.phones.data.splice(index,1); 
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
.loader-center{
      position: absolute;
    text-align: center;
    left: 50%;
    top: 50%;
}
.loader-center-secound{
   position: absolute;
    text-align: center;
    left: 50%;
    top: 477%;
}
</style>
