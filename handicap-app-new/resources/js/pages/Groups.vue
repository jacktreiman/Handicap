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
            </div>
          </form>
          <form @submit.prevent = "addGroup_usr" class = "mb-3">
              <div class="form-group">
            <input type="text" class="form-control" placeholder="Group id" v-model="group_usr.group_id">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="User id" v-model="group_usr.user_id">
            </div>
            <button type = "submit" class = "btn btn-light tn-block">Join Group</button>
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
        group_usrs: [],
        group_usr: {
          group_id: '',
          user_id: '',
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
        .then(this.fetchGroups())
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
      },
      addGroup_usr(){
        fetch('/api/group_usr',{
          method: 'post',
          body: JSON.stringify(this.group_usr),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          //this.group.name = '';
          this.group_usr.group_id = '';
          this.group_usr.user_id = '';
        })
        .catch(err => console.log(err))
      },

    }
    
}
</script>
