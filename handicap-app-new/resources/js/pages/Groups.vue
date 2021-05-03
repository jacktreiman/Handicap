<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create/Join a Friend Group</div>
            
          <form @submit.prevent = "addGroup" class = "mb-3">
            <div class="form-group">
              <div class="card-body"><strong>Create a new friend group:</strong></div>
              <input type="text" class="form-control" placeholder="Enter Group Name" v-model="group.name">
              <br>
              <button type = "submit" class = "btn btn-light tn-block">Create Group</button>
              <hr>
              <div class="card-body"><strong>Join a friend group to chat and view friend's scores:</strong></div>
              <br>
              <input type="text" class="form-control" placeholder="Enter Group ID" v-model="group.id">
              <br>
              <button type = "submit" class = "btn btn-light tn-block"><router-link data-toggle="collapse" :to="{ name: 'group-info' }">Join Group</router-link></button>
              <hr>
            </div>
          </form>

          <div class="card-body"><strong>Available Friend Groups:</strong></div>
          <div class = "card card-body mb-2" v-for="group in groups" v-bind:key="group.id">
            <h3> 
              {{group.name}}  
            </h3>
            id:({{group.id}})
          </div>  
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {
    data() {
      return{
        groups: [],
        group: {
          id: '',
          name: '',
        },
        pagination: {},
        edit: false
      }
    },  
    created(){
      this.fetchGroups();
    },
    methods: {
      addGroup(){
        fetch('/api/group',{
          method: 'post',
          body: JSON.stringify(this.group),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.group.name = '';
        })
        .catch(err => console.log(err))
      },

      fetchGroups(){
        fetch('/api/groups')
          .then(res => res.json())
          .then(res => {
            this.groups = res.data;
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
      }
    } 

}
</script>
