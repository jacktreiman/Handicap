<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Group Info</div>
        
          <div class="card-body">Groups</div>
          <form @submit.prevent = "addChat" class = "mb-3">
            <div class="form-group">
              <div class="card-body"><strong>Leave a Comment</strong></div>
              <input type="text" class="form-control" placeholder="Enter Comment" v-model="post.chat">
              <br>
              <input type="text" class="form-control" placeholder="Enter Group Id" v-model="post.group_id">
              <br>
              <input type="text" class="form-control" placeholder="Enter User Id" v-model="post.user_id">
              <br>
              <button type = "submit" class = "btn btn-light tn-block">send message</button>
              <hr>
            </div>
          </form>
           <div class = "card card-body mb-2" v-for="group in groups" v-bind:key="group.id">
            <h3> 
              {{group.id}}: {{group.name}} - Leaderboard
            </h3>
            <div v-for="score in scores" v-bind:key="score.id">
              <template v-if="score.group_id === group.group_id">
                <li>{{score.user_id}}: {{score.strokes}} - Differential: {{score.differential}}</li></template></div>
            <h3>
              Chat:
            </h3>
            <div v-for="groupPost in groupPosts" v-bind:key="groupPost.id">
              <template v-if="groupPost.group_id === group.group_id">
                <p>
                  {{groupPost.user_id}}: {{groupPost.chat}}
                  </p>
                  </template>
                  </div>
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
  scores: [],
  groupPosts: [],
  posts: [],
  post:{
      chat: '',
      group_id: '',
      user_id: '' 
  }
      }
},
created(){
  this.fetchScores();
  this.fetchGroups();
  this.fetchPosts();
},
methods: {
  fetchGroups(){
        fetch('/api/group_usrs')
          .then(res => res.json())
          .then(res => {
            this.groups = res.data;
            console.log(this.groups);
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
      },
    fetchScores(){
      fetch('/api/groupScores')
          .then(res => res.json())
          .then(res => {
            this.scores = res.data;
            console.log(this.scores);
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
    },
        addChat(){
        fetch('/api/post',{
          method: 'post',
          body: JSON.stringify(this.post),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.post.chat = '';
        })
        .then(this.fetchPosts())
        .catch(err => console.log(err))
      },
      fetchPosts(){
      fetch('/api/posts')
          .then(res => res.json())
          .then(res => {
            this.groupPosts = res.data;
            console.log(this.groupPosts);
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
    },
}
}
</script>