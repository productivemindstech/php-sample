cd tests
echo "server starting..."
pwd 
python -m SimpleHTTPServer 3000 > /dev/null 2>&1 &
sleep 5
echo "server started"