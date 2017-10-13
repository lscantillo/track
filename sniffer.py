import socket
import sys
import time
import MySQLdb


# Unpack Ethernet Frame


def main():
    print("Connecting to MySQL DB.")
    db = MySQLdb.connect('designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com', 'abcr', 'abcr1234', 'designlocations')
    cursor = db.cursor()
    print("Retrieving latest database data.")
    cursor.execute("""SELECT id FROM locations2 ORDER BY id DESC LIMIT 1""")
    startid2 = cursor.fetchone()
    startid2 = startid2[0]
    cursor.execute("""SELECT id FROM locations ORDER BY id DESC LIMIT 1""")
    startid1 = cursor.fetchone()
    startid1 = startid1[0]
    print("Latest ID for locations = " + str(startid1))
    print("Latest ID for locations2 = " + str(startid2))
    print("Creating socket object.")
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    print("Defining socket (ip+port).")
    HOST = socket.gethostbyname(socket.gethostname())
    s.bind((HOST, 56303))
    print("Looks good for now!")
    print("Accepting.")
    while True:
        while True:
            data, addr = s.recvfrom(65536)
            print("Raw data received: " + str(data))
            info = str(data)
            if data:
                itIs, Year, Mnum, Day, Hour, Minutes, Seconds, lat, lon = getMess(info)
                if itIs == 1:
                    startid1 = startid1 + 1
                    print("Event " + str(startid1) + " was triggered, the latitude is " + str(lat) + " and longitude is " + str(lon))
                    datetime = str(Year) + "-" + str(Mnum) + "-" + str(Day) + " " + str(Hour) + ":" + str(Minutes) + ":" + str(Seconds)
                    print("It was triggered at time " + datetime + " by: App")
                    cursor.execute("""INSERT INTO designlocations.locations (ID, Latitude, Longitude, DateTime) VALUES (%s, %s, %s, %s)""", (startid2, lat, lon, datetime))
                    db.commit()
                if itIs == 2:
                    startid2 = startid2 + 1
                    print("Event " + str(startid2) + " was triggered, the latitude is " + str(lat) + " and longitude is " + str(lon))
                    datetime = str(Year) + "-" + str(Mnum) + "-" + str(Day) + " " + str(Hour) + ":" + str(Minutes) + ":" + str(Seconds)
                    print("It was triggered at time " + datetime + " by: Syrus")
                    cursor.execute("""INSERT INTO designlocations.locations2 (ID, Latitude, Longitude, DateTime) VALUES (%s, %s, %s, %s)""", (startid2, lat, lon, datetime))
                    db.commit()
                else:
                    print("The Message Was Ignored")
            else:
                break


def getMess(m):
    if m[0:4] == ">REV":
        print("Processing Received Data...")
        # Confirmation
        itIs = 2
        # Time
        Year, Mnum, Day, Hour, Minutes, Seconds = getTime(int(m[6:10]), int(m[10]), int(m[11:16]))
        # Coordinates
        lat = float(m[17:19]) + (float(m[19:24]) / 100000)
        if m[16] == "-":
            lat = -lat
        lon = float(m[25:28]) + (float(m[28:33]) / 100000)
        if m[24] == "-":
            lon = -lon
    elif m[0:7] == "ABCRApp":
        print("Processing Received Data...")
        # Confirmation
        itIs = 1
        # Time
        Year = int(m[28:32])
        Mnum = int(m[33:35])
        Day = int(m[36:38])
        Hour = int(m[39:41])
        Minutes = int(m[42:44])
        Seconds = int(m[45:47])
        # Coordinates
        lat = float(m[9:17])
        if m[8] == "-":
            lat = -lat
        lon = float(m[19:27])
        if m[18] == "-":
            lon = -lon
    else:
        print("Data doesn't fit format.")
        lat = 0
        lon = 0
        itIs = 0
        Year = 0
        Day = 0
        Hour = 0
        Minutes = 0
        Seconds = 0
        Mnum = 0
    return itIs, Year, Mnum, Day, Hour, Minutes, Seconds, lat, lon


def getTime(wks, days, scnd):
    seco = wks * 7 * 24 * 60 * 60 + (days + 3657) * 24 * 60 * 60 + scnd - 5 * 60 * 60
    t = time.localtime(seco)
    Year = t.tm_year
    Mnum = t.tm_mon
    Day = t.tm_mday
    Hour = t.tm_hour
    Minutes = t.tm_min
    Seconds = t.tm_sec
    return Year, Mnum, Day, Hour, Minutes, Seconds


if __name__ == "__main__":
    main()

