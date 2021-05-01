<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Score Leaderboard</div>
          <div class="card-body">Top 10 rounds (raw scores):</div>
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
console.log("hello");
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
        fetchScores(){
          fetch('/api/scores')
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