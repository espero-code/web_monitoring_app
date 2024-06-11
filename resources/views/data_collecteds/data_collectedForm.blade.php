    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
    <div class="col-md-8">
        <form action="{{ isset($dataCollected) ? route('admin.dataCollected.update', ['dataCollected' => $dataCollected->id]) : route('admin.dataCollected.store') }}" method="POST" >
        @csrf
        @if(isset($dataCollected))
            @method('PUT')
        @endif    <div class="mb-3">
        <label for="measured_value" class="form-label">Measured_value</label>
        <input type="text"  placeholder="Measured_value ..."  name="measured_value" value="{{ old('measured_value', isset($dataCollected) ? $dataCollected->measured_value : '') }}" class="form-control" id="measured_value" aria-describedby="measured_valueHelp" required/>

        @error('measured_value')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="running_time" class="form-label">Running_time</label>
        <input type="text"  placeholder="Running_time ..."  name="running_time" value="{{ old('running_time', isset($dataCollected) ? $dataCollected->running_time : '') }}" class="form-control" id="running_time" aria-describedby="running_timeHelp" required/>

        @error('running_time')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="running_status" class="form-label">Running_status</label>
        <input type="text"  placeholder="Running_status ..."  name="running_status" value="{{ old('running_status', isset($dataCollected) ? $dataCollected->running_status : '') }}" class="form-control" id="running_status" aria-describedby="running_statusHelp" required/>

        @error('running_status')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="data_count" class="form-label">Data_count</label>
        <input type="text"  placeholder="Data_count ..."  name="data_count" value="{{ old('data_count', isset($dataCollected) ? $dataCollected->data_count : '') }}" class="form-control" id="data_count" aria-describedby="data_countHelp" required/>

        @error('data_count')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <a href="{{ route('admin.dataCollected.index') }}" class="btn btn-danger mt-1">
        Cancel
    </a>
    <button class="btn btn-primary mt-1"> {{ isset($dataCollected) ? 'Update' : 'Create' }}</button>
 </form>
    </div>
    <div class="col-md-4">
    <a  class="btn btn-danger mt-1" href="{{ route('admin.dataCollected.index') }}">
    Cancel
</a>
<button class="btn btn-primary mt-1"> {{ isset($dataCollected) ? 'Update' : 'Create' }}</button>
    </div>
    </div>

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <script>
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });

        $(document).ready(function() {
            $('select').select2();
        });
        function triggerFileInput(fieldId) {
            const fileInput = document.getElementById(fieldId);
            if (fileInput) {
                fileInput.click();
            }
        }

        const imageUploads = document.querySelectorAll('.imageUpload');
        imageUploads.forEach(function(imageUpload) {
            imageUpload.addEventListener('change', function(event) {
                event.preventDefault()
                const files = this.files; // Récupérer tous les fichiers sélectionnés
                console.log(files)
                if (files && files.length > 0) {
                    const previewContainer = document.getElementById('preview_' + this.id);
                    previewContainer.innerHTML = ''; // Effacer le contenu précédent

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file) {
                            const reader = new FileReader();
                            const img = document.createElement('img'); // Créer un élément img pour chaque image

                            reader.onload = function(event) {
                                img.src = event.target.result;
                                img.alt = "Prévisualisation de l'image"
                                img.style.maxWidth = '100px';
                                img.style.display = 'block';
                            }

                            reader.readAsDataURL(file);
                            previewContainer.appendChild(img); // Ajouter l'image à la prévisualisation
                            console.log({img})
                            console.log({previewContainer})
                        }
                    }
                    console.log({previewContainer})
                }
            });
        });
    </script>
    @endsection