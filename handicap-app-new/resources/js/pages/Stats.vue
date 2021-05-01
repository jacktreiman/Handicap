<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Stats</div>
          <div class="card-body">Include statuees here.</div>
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
        edit: false
      }
    },
    created(){
      this.fetchScores();
    },

    methods: {
        fetchScores(){
          fetch('/api/scores')
          .then(res => res.json)
          .then(res => {
            console.log(res.data)
          });
        }

}
}
</script>