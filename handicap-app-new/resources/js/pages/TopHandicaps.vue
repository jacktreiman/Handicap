<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">User Handicap</div>

          <div class="card-body">User handicap.</div>
          <div class = "card card-body mb-2" v-for="score in scores" v-bind:key="score.id">
            <h3> 
              {{score.id}}: {{score.differential}}
            </h3>
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
        edit: false,
        differentials: [],
        handicap: {
          differential: '',
        }
    } 
    },
    created(){
      this.fetchHandicaps();
    },
    methods: {
    fetchHandicaps(){
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
