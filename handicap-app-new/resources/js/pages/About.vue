<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">About this App</div>

          <div class="card-body" id = "stats">We like golf so we made this.</div>
          
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import * as d3 from 'd3';
//let scoreData;
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
    this.fetchScores()
    this.createStats()
  },
  methods:{
    
    fetchScores(){
       fetch('/api/scores')
          .then(res => res.json())
          .then(res => {
            this.scores = res.data;
            scoreData = res.data;
            console.log(this.scores)
            return scoreData
          })
          .then(
            
          )
          .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
                  
    },  
    createStats(){

    var rowConverter = function (d) {
    return{
        id: parseFloat(d.id),
        strokes: parseFloat(d.strokes),
        course: parseFloat(d.course),
        slope: parseFloat(d.slope),
        differential: parseFloat(d.differential),
        user_id: parseFloat(d.user_id)
    }
};
//scoreData =  fetch('/api/scores');
//console.log(scoreData)
let url = '/api/scores';
console.log(JSON.parse(fetch(url)))
      d3.json(Json.parse(fetch(url)), rowConverter, function(data){
      makeDesign(data)
          });
      function makeDesign(data){
      var svg = d3.select("#stats")
        .append("svg")
        .attr("width", "800px")
        .attr("height", "600px")
      svg.selectAll("circle")
      .attr("cx", function(d)
      {
        return d.id*2;
      })
      .attr("cy", function(d)
      {
        return 300;
      })
      .attr("r", function(d){
        return d.differential / 2;
      })
      .attr("fill", function(d){
        if(d.differential < 20){
          return "green"
        }
        else {
          return "blue"
        }
      })
      .attr("stroke", "black")
      }

      },
  },


}
</script>
