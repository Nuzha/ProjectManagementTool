 




<script>
$(document).ready(function() {
    $('#discussion_form').bootstrapValidator({
        fields: {
            discussion: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            discription: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            
        },
       
    });
});
</script>




<div class="row" id='dis'>
                    
    
    
  </div>

         
		    <div class = "modal fade" id = "members">
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <p><b>Project Assign Members</b></p>
                                                    </div>
                                                    <div class = "modal-body">
                                                   
                                                        
                                                        
<!--                                                       ------------------------------------------------------>
                                                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
<!--                                                       ------------------------------------------------------->
                                                    </div>
                                                    <div class = "modal-footer">
                                                        <a class ="btn btn-default" href="#test" data-dismiss= "modal">Submit</a>
                                                        <a class ="btn btn-primary" data-dismiss = "modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>