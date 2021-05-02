<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">User Handicap</div>

          <div class="card-body">User handicap.</div>
          <div class = "card card-body mb-2" v-for="handicap in differentials" v-bind:key="handicap.differential">
            <h3> 
              {{score.differential}}
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
      this.fetchHandicap();
    },
    methods: {
    fetchHandicap(){
          fetch('/api/userDifferentials')
          .then(res => res.json())
          .then(res => {
            if(res.data.length < 10){
            this.differentials = res.data.differential;
            }
          })
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
        }

} 
}
</script>
