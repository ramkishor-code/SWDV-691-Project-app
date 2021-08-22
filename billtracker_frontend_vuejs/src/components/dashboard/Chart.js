import {
    Line,
    mixins
} from 'vue-chartjs'
import axios from "axios";
import configs from "../../services/config";

export default {
    extends: Line,
    mixins: [mixins.reactiveProp],
    
    data() {
        return {
            options: { //Chart.js options
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false,
              
            },
        
        }
    },
  async  mounted() {
   


          const response = await axios.get(
            configs.appurl + "/dashboard/categorygraph/"+localStorage.getItem("user")
          );
          this.renderChart(response.data, this.options);
          
         
   

    }
    
}