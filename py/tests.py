import cv2
import numpy as np 

MAX = 255
MIN = 0

def stretch(img):
    #encontrando el maximo y minimo valor de brillo en la imagen
    min = np.amin(img)
    max = np.amax(img)

    # I(r,c)max - I(r,c)min
    resta_pixels = max - min
    # MAX - MIN
    resta = MAX - MIN

    for row in range(img.shape[0]):
        for col in range(img.shape[1]):
            pixel = img[row,col]
            img[row,col] = ((pixel-min)/resta_pixels)*resta + MIN


def shrink(img, s_min, s_max):
    # encontrando el maximo y minimo valor de brillo en la imagen
    min = np.amin(img)
    max = np.amax(img)

    # Shrink_max - Shrink_min
    s_resta = s_max - s_min
    # I(r,c)max - I(r,c)min
    resta_pixels = max - min

    for row in range(img.shape[0]):
        for col in range(img.shape[1]):
            pixel = img[row,col]
            img[row,col] = (s_resta/resta_pixels)*(pixel-min) + s_min


def unsharp_masking(img):
	#Filtro paso bajo
	img_filter = img.copy()
	img_filter = cv2.GaussianBlur(img_filter,(3,3),0)

	# Compresión de Histograma
	shrink(img_filter, 0, 100)

	# Substracción
	sub_image = cv2.subtract(img, img_filter)
	stretch(sub_image)

	return sub_image

img = cv2.imread("../edits/IMG.png")

imagen = unsharp_masking(img);

cv2.imshow("asdasd", imagen)
cv2.waitKey()
cv2.destroyAllWindows()