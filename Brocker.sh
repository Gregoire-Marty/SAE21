#!/bin/bash

echo 'Welcome to public script of sae 23'
echo '**********************************'
echo "this script is used for, publish some data to catch it with the web server or others things"
echo '**********************************'
echo "please use Ip $ip to catch data because this script. publish data on the IP $ip "
echo '**********************************'
echo ''
echo '**********************************'
echo 'enjoy it'
sleep 30
id=0
i=1
while true
do
	echo 'creating data'
	gene_temp_s1_b1=$(shuf -i 35-50 -n1)
	gene_temp_s2_b1=$(shuf -i 12-24 -n1)
	gene_temp_s1_b2=$(shuf -i 300-400 -n1)
	gene_temp_s2_b2=$(shuf -i 300-400 -n1)
	
	echo 'publishing'
	((id=id+1))
	mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s1_b1',"id":'$id',"cap":1}'
	sleep 3
	((id=id+1))
	mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s2_b1',"id":'$id',"cap":2}'
	sleep 3
	((id=id+1))
	mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s1_b2',"id":'$id',"cap":3}'
	sleep 3
	((id=id+1))
	mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s2_b2',"id":'$id',"cap":4}'
	echo "publishing $i succesfuly"
	sleep 50
	id=$(($id+4))
	i=$(($i+1))
done
