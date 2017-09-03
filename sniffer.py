import socket
import sys
import time
import MySQLdb


# Unpack Ethernet Frame


def main():
    print("Connecting to MySQL DB.")
    db = MySQLdb.connect('designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com','abcr','abcr1234','designlocations')
    cursor = db.cursor()

    print("Creating socket object.")
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    print("Defining socket (ip+port).")
    HOST = socket.gethostbyname(socket.gethostname())
    s.bind((HOST, 56303))
    print("Arigato ningen.")
    print("Accepting.")
    while True:
        while True:
            data, addr = s.recvfrom(65536)
            print("Raw data received: " + str(data))
            info = str(data)[2:]
            if data:
                itIs, EventDef, seco, Year, Month, Mnum, Day, Hour, Minutes, Seconds, lat, lon = getMess(info)
                if itIs == 1:
                    print("Event " + str(EventDef) + " was triggered, the latitude is " + str(lat) + " and longitude is " + str(lon))
                    date=str(Year)+"-"+str(Mnum)+"-"+str(Day)
                    time=str(Hour)+":"+str(Minutes)+":"+str(Seconds)
                    cursor.execute("""INSERT INTO designlocations.locations (ID, Latitude, Longitude, Date, Time) VALUES (%s, %s, %s, %s, %s)""",(EventDef, lat, lon, date, time))

                    db.commit()
                else:
                    print("The Message Was Ignored")
            else:
                break
        


def getMess(m):
    # print("Raw data received: " + m)
    if m[0:4] == ">REV":
        # print("Raw data: " + m)
        print("Processing Received Data...")
        # Confirmation
        itIs = 1
        # Event
        EventDef = int(m[4:6])
        # Time
        secn, Year, Month, Mnum, Day, Hour, Minutes, Seconds = getTime(int(m[6:10]), int(m[10]), int(m[11:16]))
        # Coordinates
        lat = float(m[17:19]) + (float(m[19:24]) / 100000)
        if m[16] == "-":
            lat = -lat
        lon = float(m[25:28]) + (float(m[28:33]) / 100000)
        if m[24] == "-":
            lon = -lon
    else:
        EventDef = 0
        lat = 0
        lon = 0
        itIs = 0
        secn = 0
        Year = 0
        Month = 0
        Day = 0
        Hour = 0
        Minutes = 0
        Seconds = 0
        Mnum=0
    return itIs, EventDef, secn, Year, Month, Mnum, Day, Hour, Minutes, Seconds, lat, lon


def getTime(wks, days, scnd):
    seco = wks * 7 * 24 * 60 * 60 + (days + 3657) * 24 * 60 * 60 + scnd 
    t = time.localtime(seco)
    posmonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    Year = t.tm_year
    Month = posmonths[t.tm_mon - 1]
    Mnum=t.tm_mon
    Day = t.tm_mday
    Hour = t.tm_hour
    Minutes = t.tm_min
    Seconds = t.tm_sec
    return seco, Year, Month, Mnum, Day, Hour, Minutes, Seconds


main()
