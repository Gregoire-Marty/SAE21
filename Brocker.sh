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
i=1
id=0
while true
do
	echo 'creating data'
	gene_temp_s1_b1=$(shuf -i 16-28 -n1)
	gene_temp_s2_b1=$(shuf -i 17-27 -n1)
	gene_temp_s1_b2=$(shuf -i 16-27 -n1)
	gene_temp_s2_b2=$(shuf -i 18-26 -n1)
	
	gene_co2_s1_b1=$(shuf -i 300-400 -n1)
	gene_co2_s2_b1=$(shuf -i 300-400 -n1)
	gene_co2_s1_b2=$(shuf -i 300-400 -n1)
	gene_co2_s2_b2=$(shuf -i 300-400 -n1)
	
	echo 'publishing'
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s1_b1',"id":'$id',"cap":1}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s2_b1',"id":'$id',"cap":3}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s1_b2',"id":'$id',"cap":5}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_temp_s2_b2',"id":'$id',"cap":7}'
sleep 3


((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_co2_s1_b1',"id":'$id',"cap":2}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_co2_s2_b1',"id":'$id',"cap":4}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_co2_s1_b2',"id":'$id',"cap":6}'
sleep 3
((id=id+1))
mosquitto_pub -h localhost -u user -P passroot -t iut/BatE -m '{"value":'$gene_co2_s2_b2',"id":'$id',"cap":8}'



echo "publishing $i succesfuly"
sleep 25
i=$(($i+1))
done
