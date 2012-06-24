#!/usr/bin/python

# tlabarre

# import modules
import re
import sys
import os
import glob
import operator

# data_file = 'SDS-PAGE--KK (9-20-05).txt'
# data_file = 'Western blot assay.txt'


result_file = 'result.csv'

outfile = open(result_file,'w')

for infile in glob.glob( os.path.join( 'sample','*') ):
    infile_ = open(infile,'r')
    for line in infile_.readlines():
        temp_line = line
        number = re.search('\(Bio-?Rad.*(\d\d\d-\d+)\)',line)
        if number:
            outfile.write(temp_line.strip() + ',http://www.bio-rad.com/prd/en/US/adirect/biorad?cmd=catProductDetail&isFromSearch=true&productID=' + number.group(1) + '\n')

outfile.close()
