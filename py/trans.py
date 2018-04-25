import sys
import cv2
import numpy as np


def rotate(img, degree):
	rows, cols, _ = img.shape

	M = cv2.getRotationMatrix2D((cols/2, rows/2), degree, 1)
	cos = np.abs(M[0,0])
	sin = np.abs(M[0,1])

	nR = int((rows * sin) + (cols * cos))
	nC = int((rows * cos) + (cols * sin))

	M[0,2] += (nR/2) - (cols/2)
	M[1,2] += (nC/2) - (rows/2)

	return cv2.warpAffine(img, M, (nR, nC))

def flip(img, axis):
	return cv2.flip(img, axis)

if __name__ == "__main__":

	opt = sys.argv[1].lower()
	param = int(sys.argv[2])
	file = sys.argv[3]

	img = cv2.imread("../edits/" + file)

	if opt == "rotate":
		img = rotate(img, param)
	elif opt == "flip":
		img = flip(img, param)
	
	cv2.imwrite("../edits/" + file, img)

	sys.stdout.write(file)
