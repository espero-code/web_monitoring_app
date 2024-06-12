    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($module) ? route('admin.modules.update', ['module' => $module->id]) : route('admin.modules.store') }}"
                method="POST">
                @csrf
                @if (isset($module))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" placeholder="Name ..." name="name"
                        value="{{ old('name', isset($module) ? $module->name : '') }}" class="form-control"
                        id="name" aria-describedby="nameHelp" required />

                    @error('name')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" placeholder="Description ..." name="description"
                        value="{{ old('description', isset($module) ? $module->description : '') }}"
                        class="form-control" id="description" aria-describedby="descriptionHelp" required />

                    @error('description')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" id="status" aria-describedby="statusHelp" required>
                        <option value="1"
                            {{ old('status', isset($module) && $module->status == true ? 'selected' : '') }}>On</option>
                        <option value="0"
                            {{ old('status', isset($module) && $module->status == false ? 'selected' : '') }}>Off
                        </option>
                    </select>

                    @error('status')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="measured_type" class="form-label">Type de Données à Collecter</label>
                    <select name="measured_type_id" class="form-control" id="measured_type" required>
                        @foreach ($measuredTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('measured_type_id', isset($module) && $module->measured_type_id == $type->id ? 'selected' : '') }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('measured_type')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('admin.modules.index') }}" class="btn btn-danger mt-1">
                    Annuler
                </a>
                <button class="btn btn-primary mt-1"> {{ isset($module) ? 'Mettre à jour' : 'Ajouter' }}</button>
            </form>
        </div>

    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
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
                                const img = document.createElement(
                                    'img'); // Créer un élément img pour chaque image

                                reader.onload = function(event) {
                                    img.src = event.target.result;
                                    img.alt = "Prévisualisation de l'image"
                                    img.style.maxWidth = '100px';
                                    img.style.display = 'block';
                                }

                                reader.readAsDataURL(file);
                                previewContainer.appendChild(img); // Ajouter l'image à la prévisualisation
                                console.log({
                                    img
                                })
                                console.log({
                                    previewContainer
                                })
                            }
                        }
                        console.log({
                            previewContainer
                        })
                    }
                });
            });
        </script>
    @endsection
