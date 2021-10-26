<h3>section-form-enquiry.php</h3>
<div id="success_message" class="alert alert-success" style="display:none">jai</div>

<form id="enquiry">
<h2>Send an enquiry about <?php the_title();?></h2>
<input type="text" name="fname" placeholder="First Name"  class="form-control" required>
<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
<input type="email" name="email" placeholder="Email Address"  class="form-control" required>
<input type="tel" name="phone" placeholder="Phone" class="form-control" required> 
<textarea name="enquiry" class="form-control" placeholder="Your Enquiry" required></textarea>  
<button type="submit" >Send your enquiry</button>
</form>
<script>
    (function($){
        $('#enquiry').submit(function(event) {
            event.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php');?>';
            var form = $('#enquiry').serialize();
            var formdata = new FormData;
            formdata.append('action','enquiry');
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce');?>');
            formdata.append('enquiry',form);
            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function (res) {

                    $('#enquiry').fadeOut(200);

                    $('#success_message').text('Thanks for your enquiry').show();

                    $('#enquiry').trigger('reset');

                    $('#enquiry').fadeIn(500);

                },
                error: function (err) {
                    alert(err.responseJSON.data);
                }
            })
        })
    })(jQuery);
</script>
<h3>/section-form-enquiry.php</h3>