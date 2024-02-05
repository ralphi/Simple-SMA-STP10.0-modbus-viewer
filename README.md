# Simple-SMA-STP10.0-modbus-viewer

Since I couldn't find anything simple, I wrote a very simple program in php myself that writes the necessary data into a Json.
 You can find the registers at: 
https://files.sma.de/downloads/PARAMETER-HTML_STPxx-3SE-40_30109R_V11.zip 

The registers can be expanded as desired in ‘items.php’ and then please write here. 

As well described in Wikipedia, the command to read is: 
https://de.wikipedia.org/wiki/Modbus 

The settings are: 
![settings](https://github.com/ralphi/Simple-SMA-STP10.0-modbus-viewer/assets/4216875/ac72b08f-84f3-4894-a88e-49d6e0889795)

Example DC input A: 

Assignment any: \x00\x02 (respose has the same) 
always: \x00\x00 
number of bytes: \x00\x06\ 
read reg: \x03\x03 
offset add: \x78\x31 
exp. resp (count): \x00\x06" (6 x 16bit = 3 values) 

