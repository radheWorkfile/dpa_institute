<style>
    .fade-message {display: none;}
        .upload-container {
    position: relative;
    width: 100%;
    height: 110px; 
    border: 2px dashed #ddd;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    cursor: pointer;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    flex-direction: column;
}

#upload-message {
    color: #777;
    font-size: 16px;
    font-weight: bold;
    transition: opacity 0.3s ease;
  
    display: block;
}

#image-preview {
    max-width: 100%;
    max-height: 59px;
    border-radius: 8px;
    margin-top: -28px;
    display: none;
    object-fit: contain; 
}

.upload-container:hover #upload-message {
    color: #555;
}

    </style>









