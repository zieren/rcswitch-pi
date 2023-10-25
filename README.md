# About

This is a tool to use radio controlled power sockets with the Raspberry Pi. It is forked from https://github.com/r10r/rcswitch-pi (kudos to [r10r](https://github.com/r10r)) to fix some trivial compiler issues. It is tested on a Raspberry Pi 1 and 4 (the models I have at hand). I expect to be using this myself for the foreseeable future and hope to be able to maintain it. Despite being old, it works just fine for me.

# Instructions

1. Install [WiringPi](https://github.com/WiringPi/WiringPi):
   ```
   git clone https://github.com/wiringpi/wiringpi
   cd wiringpi
   ./build
   ```
1. If you want to use a specific GPIO pin, edit the `send.cpp` source file. The default is GPIO17.
1. Compile `rcswitch-pi`:
   ```
   git clone https://github.com/zieren/rcswitch-pi
   cd rcswitch-pi
   make
   ```
1. Call it with system code, unit code and desired state. Example:
   ```
   rcswitch 10011 3 1
   ```
