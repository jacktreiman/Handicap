<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Post a Score</div>
          <div class="card-body">Input a score here.</div>
          <form @submit.prevent = "addScore" class = "mb-3">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="strokes" v-model="score.strokes">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="course rating" v-model="score.course">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="slope" v-model="score.slope">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder :id= "userid" v-model="score.user_id">
            </div>
              <button type = "submit" class = "btn btn-light tn-block">Enter a score</button>
            </form>
            <div class = "card card-body mb-2" v-for="score in scores" v-bind:key="score.id">
            <h3> 
              {{score.user_id}}
            </h3>
            <p>
              Score: 
              {{score.strokes}}
              Differential: 
              {{score.differential}}
              </p>
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
        scores: [],
        score: {
          id: '',
          strokes: '',
          course: '',
          slope: '',
          differential: '',
          user_id: ''
        },
        scores_id: '',
        pagination: {},
        edit: false
      }
    },  
        created(){
      this.fetchScores();
    },

    methods: {
      addScore(){
        fetch('/api/score',{
          method: 'post',
          body: JSON.stringify(this.score),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.score.strokes = '';
          this.score.course = '';
          this.score.slope = '';
        })
        .catch(err => console.log(err))
      },

        fetchScores(){
          fetch('/api/userScores')
          .then(res => res.json())
          .then(res => {
            this.scores = res.data;
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
        }

} 
}

</script>