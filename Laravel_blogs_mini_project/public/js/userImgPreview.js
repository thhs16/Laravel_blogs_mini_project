
            function loadFile(event){
                var reader = new FileReader();

                reader.readAsDataURL(event.target.files[0]);

                // selecting div tag in form tag to be added the image
                let imgSpace = document.getElementById('blogImgSpace'); // ok

                reader.onload = function (){

                    // The tag to add
                    let blogImgTag = `<img src="${ reader.result }" class="w-100 img-thumbnail mb-2"></img>`;

                    // putting the img tag
                    imgSpace.innerHTML = (blogImgTag);
                    console.log('img preview success');
                }
            }
