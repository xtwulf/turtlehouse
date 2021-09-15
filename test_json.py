import json

x = '{ "name":"test", "age":22, "sex":"male"}'

y = json.loads(x)

print (y["sex"])