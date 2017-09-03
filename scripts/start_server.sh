#!/bin/bash
service httpd start
service mysqld start
python sniffer.py
