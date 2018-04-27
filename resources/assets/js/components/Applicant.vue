<template>
<div>
    <table class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>application_number</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Applicant   Name</th>
                                
            </tr>
            </thead>
            <tbody>
                <tr v-for="applicants in applicant" :key="applicants.id">
                         <td>{{applicants.application_number}}</td>
                        <td>{{applicants.status}}</td>
                        <td>{{applicants.submitted_at}}</td>
                        <td>{{applicants.name}}</td>
                </tr>
            </tbody>
        </table>
</div>

</template>
<script>
export default {
    data: function () {
            return {
                applicant: []
                
            }
        },
       mounted() {
            this.getDate();            
           
        },     
        
        methods: {
            getDate () {
                axios.get('/user/showapplicant')
                .then(
                    response=> {this.applicant = response.data}
                )
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load Applicants");
                });
            }
        }
}


</script>