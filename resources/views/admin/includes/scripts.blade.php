{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- bootstrap script  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


{{-- sweet alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    </script>
@endif

@if(session('error'))
    <script>
        swal({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            button: "OK",
        });
    </script>
@endif


{{-- Select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.single-select2').select2();
    });
    $(document).ready(function() {
        $('.multiple-select2').select2({
            placeholder: "Select options from here",
            allowClear: true
        });
    });
</script>



{{-- DatePicker plugin --}}
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        showOtherMonths: true
    });
    
</script>


{{-- sidebar dropdown menu --}}
<script>
    $(function() {
        var $ul = $('.sidebar-navigation > ul');

        $ul.find('li a').click(function(e) {
            var $li = $(this).parent();

            if ($li.find('ul').length > 0) {
                e.preventDefault();

                if ($li.hasClass('selected')) {
                    $li.removeClass('selected').find('li').removeClass('selected');
                    $li.find('ul').slideUp(400);
                    $li.find('a em').removeClass('mdi-flip-v');
                } else {

                    if ($li.parents('li.selected').length == 0) {
                        $ul.find('li').removeClass('selected');
                        $ul.find('ul').slideUp(400);
                        $ul.find('li a em').removeClass('mdi-flip-v');
                    } else {
                        $li.parent().find('li').removeClass('selected');
                        $li.parent().find('> li ul').slideUp(400);
                        $li.parent().find('> li a em').removeClass('mdi-flip-v');
                    }

                    $li.addClass('selected');
                    $li.find('>ul').slideDown(400);
                    $li.find('>a>em').addClass('mdi-flip-v');
                }
            }
        });


        $('.sidebar-navigation > ul ul').each(function(i) {
            if ($(this).find('>li>ul').length > 0) {
                var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
                var pIntPLeft = parseInt(paddingLeft);
                var result = pIntPLeft + 20;

                $(this).find('>li>a').css('padding-left', result);
            } else {
                var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
                var pIntPLeft = parseInt(paddingLeft);
                var result = pIntPLeft + 20;

                $(this).find('>li>a').css('padding-left', result).parent().addClass('selected--last');
            }
        });

        var t = ' li > ul ';
        for (var i = 1; i <= 10; i++) {
            $('.sidebar-navigation > ul > ' + t.repeat(i)).addClass('subMenuColor' + i);
        }

        var activeLi = $('li.selected');
        if (activeLi.length) {
            opener(activeLi);
        }

        function opener(li) {
            var ul = li.closest('ul');
            if (ul.length) {

                li.addClass('selected');
                ul.addClass('open');
                li.find('>a>em').addClass('mdi-flip-v');

                if (ul.closest('li').length) {
                    opener(ul.closest('li'));
                } else {
                    return false;
                }

            }
        }

    });
</script>

{{-- Sidebar active --}}
<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }
</script>


<!--Ajax Common Scripts -->
<script>
    var SITEURL = "{{ URL::to('') }}";
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var SITEURL = "{{ URL::to('') }}";
        var ASSET_URL = "{{ config('app.asset_url') }}/";
    });
</script>




{{-- change subCategory-by-category --}}
<script>
    $(function() {
        $(document).on('change', '#categoryId', function() {
            var categoryId = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ route('product.get-subCategory-by-category') }}",
                data: {
                    id: categoryId
                },
                dataType: 'JSON',

                beforeSend: function() {
                    $('#subCategoryId').empty();
                    var option = '';
                    option += '<option value="" disabled selected> Loading... </option>';
                    $('#subCategoryId').append(option);
                },
                success: function(response) {
                    var option = '';
                    option +=
                        '<option value="" disabled selected> Select Subcategory </option>';
                    $.each(response, function(key, value) {
                        option += '<option value="' + value.id + '">' + value.name +
                            '</option>';
                    });
                    var subCategoryId = $('#subCategoryId');
                    subCategoryId.empty();
                    subCategoryId.append(option);
                }

            });
        })
    })
</script>

    
{{-- image upload and preview js --}}
<script>
    function imageUpload( e ) {
        var imgPath = e.value;
        var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
        if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            readURL( e, e.id );
            $( '.' + e.id + 'error' ).hide()
            $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
        } else {
            $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
            $("#" + e.id + "_data").attr("value", "");
            $( '#' + e.id + 'Preview' ).attr( 'src', "" );
            $( '#' + e.id ).val( null );
            $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
        }
    }

    var imageName;
    function readURL( input, id ) {
        if ( input.files && input.files[ 0 ] ) {
            imageName = input.files[0].name;
            var reader = new FileReader();
            reader.readAsDataURL( input.files[ 0 ] );
            reader.onload = function ( e ) {
                $( '#' + id + 'Preview' ).removeClass( 'd-none' );
                $( '#' + id + 'PreviewNo' ).addClass( 'd-none' );
                $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                $("#" + id + "_data").attr("value", imageName);
            };
        }
    }
    function removeImage(id) {
        var noImage = "{{ asset('admin/images/default.jpg') }}";
        $( "#" + id ).val( null );
        $( '#' + id + 'Preview' ).attr( 'src', noImage );
        $( '#' + id + 'PreviewNo' ).removeClass( 'd-none' );
        $( "#" + id + "_data").attr("value", "");
        $( '#' + id + 'Name' ).html( 'Not selected' );
        $( '#' + id + 'Delete' ).css( 'display', 'none' );
        $( '#' + id + 'Delete' ).addClass( 'd-none' );
    }
</script>