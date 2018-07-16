import json
import requests
from pprint import pprint
fna = open("psidata_national","a")
fc = open("psidata_central","a")
fn = open("psidata_north","a")
fs = open("psidata_south","a")
fe = open("psidata_east","a")
fw = open("psidata_west","a")
dates = []
for year in range(2016, 2019):
    for month in range(1, 13):
        for day in range(1, 32):
            if year == 2016:
                if month == 1:
                    continue
                if month == 2:
                    continue
            if year == 2018:
                if month in range(3,13):
                    continue
                if month == 3:
                    if day in range(25, 32):
                        continue
            if month in [4,6,9,11]:
                if day == 31:
                    continue
            elif month == 2:
                if day in range(29, 32):
                    continue
            dates.append("{:02}-{:02}-{:02}".format(year, month, day))
for date in dates:
    url = "https://api.data.gov.sg/v1/environment/psi?%22date="+date+"%22"
    print(url)
    response = requests.get(url)
    data = response.json()
    pprint(data["items"][0]["readings"])
    twentyfourpsi = data["items"][0]["readings"]["psi_twenty_four_hourly"]
    central = str(twentyfourpsi['central'])
    east = str(twentyfourpsi['east'])
    national = str(twentyfourpsi['national'])
    north = str(twentyfourpsi['north'])
    south = str(twentyfourpsi['south'])
    west = str(twentyfourpsi['west'])
    print(national,central,east,north,south,west)
    '''
    fna.write(national + ',')
    fc.write(central +',')
    fn.write(north+',')
    fs.write(south+',')
    fe.write(east+',')
    fw.write(west+',')'''

fna.close()
fc.close()
fn.close()
fs.close()
fe.close()
fw.close()
