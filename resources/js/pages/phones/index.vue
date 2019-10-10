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
      <td>{{phone.status}}</td>
      <td>
       <li @click="do_call(phone.id,index)">
     
        call  <fa :icon="['fas', 'phone-square']"   :mask="['fas', 'circle']"  :class="[ phone.action==null ? 'green' : 'red']"/> 
      </li>
      </td>
    </tr>
  </tbody>
</table>
<pagination :data="phones" @pagination-change-page="getResults"></pagination>
</div>
</template>





<script>
const axios = require('axios').default;
export default {
  middleware: 'auth',
  data() {
    return {
     phones:{} ,
    }
  },
  mounted() {
   this.getResults();
  },
  methods: {
    getResults(page = 1) {
			axios.get('api/phones?page=' + page)
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
    
    }
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
