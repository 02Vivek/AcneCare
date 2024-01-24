import sys
from PIL import Image
from keras.models import load_model
import numpy as np
import cv2
import os
import openai
# from AI import cloudnine_diet, cloudnine_remedy

# Get image file path from command line argument
image_path = sys.argv[1]

try:
    # Open the image using Pillow (PIL) library
    img = Image.open(image_path)

    model = load_model('acneModel.h5')
    # Function to perform acne detection using the loaded model

    def detect_acne(image):
            
            image = image        
            # print(image.size)  # Print the dimensions of the loaded image

            image = np.array(image) / 255.0  # Normalize the image
            resized_image = cv2.resize(image,(150, 150))  # Resize the image to match the model's input size
            image = np.expand_dims(resized_image, axis=0)  # Add batch dimension

            prediction = model.predict(image)
            class_names = ["Blackheads", "Papules", "Normal", "Nodules", "Pustules", "Cystic", "WhiteHeads"]
            
            predicted_class = class_names[np.argmax(prediction)]

            return predicted_class

    predicted_class = detect_acne(img)
    
    print("Type of Acne:" +  predicted_class)


    # print("Diet for acne:")

    # print(img)
except Exception as e:
    print(f"Error: {e}")