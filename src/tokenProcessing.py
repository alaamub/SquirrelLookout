# this script is used to process one token without duplicate ..
# example CFCKKKOOOOSUkkkoooo => it will be CFKOSUko
import fileinput
from collections import Counter
from itertools import groupby
for line in fileinput.input():
	data = str.strip(line)
	count = data.__len__() 
	myarray = []
	data = map(list,data)
	i = 0
	s = [];
	for p in data:
		if str(p[0]) in myarray:
			str1 = str(p[0])
			if not (str1.lower() in myarray):
				myarray.append(str1.lower())
		else: 
			myarray.append(str(p[0])) 
	myarray.sort()
	print  ''.join(str(x) for x in myarray)
