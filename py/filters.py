import sys
import cv2
import numpy as np

def gray_scale(img):
	return cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)


if __name__ == "__main__":

	opt = sys.argv[1].lower()
	file = sys.argv[2]

	img = cv2.imread("../edits/" + file)

	if opt == "gray":
		img = gray_scale(img)

	cv2.imwrite("../edits/" + file, img)

	sys.stdout.write(file)


