<template>
  <div class="container-fluid">
      <!-- <div>
         <table class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Name of Image</th>
                <th>Image</th>
                
                                
            </tr>
            </thead>
            <tbody>
                <tr v-for="image in image" :key="image.id">
                         <td>{{image.name}}</td>
                        <td><img :src="imageLink" style="width:20%"/> </td>
                        
                </tr>
            </tbody>
        </table> 
     </div> -->
    <div class="row">
    <div class="card col-md-3 " v-for="image in image" :key="image.id" >
        <div class="card-header">
            <h3>{{image.name}}</h3>
        </div>
        <div  class="card-body col-md-12 " style="text-align:center">
               <div> <img :src="imageLink" style="width:50%;height:30%"/> </div>
              
        </div>
        <div class="card-footer footer_style" >
            <h6>Rs:34/-only</h6>
        </div>
</div>
    </div>
  </div>
</template>
<script>
export default {
    data: function () {
            return {
                image: [],
               imageLink: 'https://theflagcompany.in/wp-content/uploads/2016/01/indian-cross-table-flag-with-acrylic-base-and-stainless-steel-pole-600x600.jpg'
            }
        },
       mounted() {
            this.getDate();            
           //this.getImage();
        },     
        
        methods: {
            getDate () {
                axios.get('/user/allimage')
                .then(
                    response=> {this.image = response.data},
                  //  this.getImage='data:image/jpeg;base64,' + btoa(response.data.results[0].image.data)
                )
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load image");
                });
            }
        }
}


</script>
<style>
.footer_style
{
    text-align:center;
    background-color:rgb(228, 227, 188);
   
}
</style>
