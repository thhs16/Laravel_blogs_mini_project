
            function loadFile(event){
                var reader = new FileReader();

                reader.readAsDataURL(event.target.files[0]);

                reader.onload = function (){
                    var output = document.getElementById('output');
                    output.src = reader.result;
                    // output.classList.add("mb-2"); // this works // img's place is still left
                }
            }
