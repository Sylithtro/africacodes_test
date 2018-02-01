<script type="text/javascript">

    function submitdata()
    {
    var name=document.getElementById( "name_of_user" );
    var age=document.getElementById( "age_of_user" );
    var course=document.getElementById( "course_of_user" );

    $.ajax({
    type: 'post',
    url: 'insertdata.php',
    data: {
    user_name:name,
    user_age:age,
    user_course:course
    },
    success: function (response) {
    $('#success__para').html("You data will be saved");
    }
    });
        
    return false;
}

</script>

  //File upload script
  <script type="text/javascript">
            $(document).ready(function (e) {
                $('#upload').on('click', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'customer.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
</script>