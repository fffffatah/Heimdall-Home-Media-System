#!/bin/env /bin/bash

#Author: A.F.M. NOORULLAH

while true; do
 MYDEV='/dev/'
 MOUNTPATH='/home/ubuntu/system_a/Heimdall-Home-Media-System/src/public/storage/'
 CONNECTEDUSB=$(cd $MYDEV && ls | grep '^sd')
 MOUNTFOLDERS=$(cd $MOUNTPATH && ls | grep '^storage')
 LASTTAKENFOLDER=''
 LASTNOTTAKENFOLDER=''
 TAKENSTORAGENUM='0'
 NEWFOLDER=''
 MOUNTEDLIST=$(cd /home/ubuntu/scripts/drives && ls | sed 's/,.*//')

#CHECK MOUNT FOLDERS
 if [[ $MOUNTFOLDERS ]]; then
  while read -r folder
  do
    echo "FOLDERS: $folder"
    if mountpoint -q -- $MOUNTPATH$folder; then
     echo "It's Taken."
     LASTTAKENFOLDER=$folder
    else
     echo "It's not Taken."
     LASTNOTTAKENFOLDER=$folder
     sudo umount $MOUNTPATH$folder
     cd $MOUNTPATH && sudo rmdir $folder
    fi
  done < <(cd $MOUNTPATH && ls | grep '^storage')
 else
  echo 'empty'
  LASTTAKENFOLDER='storage0'
 fi

TAKENSTORAGENUM=$(echo $LASTTAKENFOLDER | grep -o -E '[0-9]+')

#CHECK DRIVE
 if [[ $CONNECTEDUSB ]]; then
  while read -r usb
  do
    echo "USB: $usb"
    if grep -qs $MYDEV$usb /proc/mounts; then
     echo "It's mounted."
    else
     echo "It's not mounted."
     #FORMAT IF NOT VFAT
     TAKENSTORAGENUM=$((TAKENSTORAGENUM+1))
     NEWFOLDER='storage'$TAKENSTORAGENUM
     cd $MOUNTPATH && sudo mkdir $NEWFOLDER
     if [ $(sudo blkid $MYDEV$usb -s TYPE -o value) != 'vfat' ]; then
      #TAKENSTORAGENUM=$((TAKENSTORAGENUM+1))
      #NEWFOLDER='storage'$TAKENSTORAGENUM
      #cd $MOUNTPATH && sudo mkdir $NEWFOLDER
      sudo mkfs.vfat $MYDEV$usb
     fi
     #echo $NEWFOLDER
     sudo mount $MYDEV$usb $MOUNTPATH$NEWFOLDER
     cd /home/ubuntu/scripts/drives && sudo touch $usb','$NEWFOLDER
    fi
  done < <(cd $MYDEV && ls | grep '^sd')
 else
  echo 'empty'
  cd /home/ubuntu/scripts/drives && sudo rm -rf sd*
 fi

echo $MOUNTEDLIST

 if [[ $MOUNTEDLIST ]]; then
  while read -r devlist
  do
  if [[ $CONNECTEDUSB ]]; then
   UNMOUNTABLE='no'
   while read -r mountlist
   do
    if [[ "$devlist" != "$mountlist" ]]; then
     GETFILENAME=$(cd /home/ubuntu/scripts/drives && grep "^$mountlist")
     UNMOUNTABLE=$(echo $GETFILENAME  | sed 's:.*,::')
    fi
   done < <(cd /home/ubuntu/scripts/drives && ls | sed 's/,.*//')
   sudo umount $MOUNTPATH$UNMOUNTABLE
  fi
  done < <(cd $MYDEV && ls | grep '^sd')
 else
  if [[ $(cd $MOUNTPATH && ls) ]]; then
   while read -r myfolders
   do
    sudo umount $MOUNTPATH$myfolders
   done < <(cd $MOUNTPATH && ls)
  fi
 fi
 sleep 3
done
