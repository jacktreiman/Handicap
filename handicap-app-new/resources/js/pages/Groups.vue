<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">List of All Created Groups</div>
            
          <div class="card-body">All available groups</div>
          <form @submit.prevent = "addGroup" class = "mb-3">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="name" v-model="group.name">
            </div>
            <button type = "submit" class = "btn btn-light tn-block">Enter a group</button>
            </form>

            
        </div>
        <div class = "card card-body mb-2" v-for="group in groups" v-bind:key="group.id">
          <h3> 
              {{group.id}}:  {{group.name}}
            </h3>

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
