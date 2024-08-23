@extends('layout.app')
<style>
    /* Style for file preview section */
    #file_preview img {
        max-width: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    #file_preview .file-item {
        display: inline-block;
        text-align: center;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    #file_preview .file-item .file-icon {
        font-size: 50px;
        color: #007bff;
    }

    #file_preview .file-item .file-name {
        font-size: 12px;
        margin-top: 5px;
    }
</style>
@section('content')
    <div class="container">
        <div class="jumbotron text-center bg-light p-5 rounded animate__animated animate__fadeIn">
            <h1>Welcome to Property Listings</h1>
            <p>Find your dream property with us. Start bidding on properties today!</p>
            <a href="{{ url('/properties') }}" class="btn btn-primary">Browse Properties</a>
        </div>

        <div id="file_system" class="file_system mt-3">
            <form id="file_form" action="{{ route('system.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="upload_file" class="text-success font-weight-bolder">Upload files <span class="text-danger"> * </span></label>
                    <input type="file" class="form-control" name="upload_file" id="upload_file" multiple>
                </div>
                <div id="file_preview" class="mt-3"></div>
                <button type="submit" class="btn btn-sm btn-primary mt-4">Upload File</button>
            </form>
        </div>
    </div>
@endsection

{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        // Handle file input change to display previews
        $('#upload_file').on('change', function(){
            $('#file_preview').html('');  // Clear previous previews
            var files = this.files;

            $.each(files, function(index, file){
                var fileReader = new FileReader();
                
                fileReader.onload = function(e){
                    var fileType = file.type;
                    var fileName = file.name;
                    
                    var fileItem = $('<div class="file-item"></div>');
                    
                    if(fileType.match('image.*')){
                        var img = $('<img>').attr('src', e.target.result);
                        fileItem.append(img);
                    } else if(fileType === 'application/pdf'){
                        fileItem.append('<div class="file-icon">📄</div>');
                        fileItem.append('<div class="file-name">' + fileName + '</div>');
                    } else if(fileType === 'application/vnd.ms-excel' ||
                              fileType === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
                              fileType === 'text/csv'){
                        fileItem.append('<div class="file-icon">📊</div>');
                        fileItem.append('<div class="file-name">' + fileName + '</div>');
                    } else {
                        fileItem.append('<div class="file-icon">📁</div>');
                        fileItem.append('<div class="file-name">' + fileName + '</div>');
                    }
                    
                    $('#file_preview').append(fileItem);
                };

                fileReader.readAsDataURL(file);
            });
        });

        // Optional: Handle form submission via AJAX
        $('#file_form').on('submit', function(e){
            e.preventDefault();

            var formData = new FormData(this); // Create FormData object from form

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    // Handle success response
                    alert('Files uploaded successfully!');
                    $('#file_preview').html(''); // Clear previews if needed
                    $('#upload_file').val(''); // Clear file input
                },
                error: function(xhr, status, error){
                    // Handle error response
                    alert('An error occurred while uploading files.');
                }
            });
        });
    });
</script> --}}
