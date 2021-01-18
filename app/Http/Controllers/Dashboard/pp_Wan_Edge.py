import requests
import sys
import json

requests.packages.urllib3.disable_warnings()
from requests.packages.urllib3.exceptions import InsecureRequestWarning

SDWAN_IP = "10.10.20.90"
SDWAN_USERNAME = "admin"
SDWAN_PASSWORD = "C1sco12345"


class rest_api_lib:
    def __init__(self, vmanage_ip, username, password):
        self.vmanage_ip = vmanage_ip
        self.session = {}
        self.login(self.vmanage_ip, username, password)

    def login(self, vmanage_ip, username, password):
        """Login to vmanage"""
        base_url_str = 'https://%s:8443/'%vmanage_ip
        login_action = 'j_security_check'
        login_data = {'j_username' : username, 'j_password' : password}
        login_url = base_url_str + login_action
        url = base_url_str + login_url
        sess = requests.session()
        login_response = sess.post(url=login_url, data=login_data, verify=False)

        if b'<html>' in login_response.content:
            print ("Login Failed")
            sys.exit(0)

        self.session[vmanage_ip] = sess

    def get_request(self, api):
        url = "https://%s:8443/dataservice/%s"%(self.vmanage_ip, api)
        response = self.session[self.vmanage_ip].get(url, verify=False)
        return response

Sdwan = rest_api_lib(SDWAN_IP, SDWAN_USERNAME, SDWAN_PASSWORD)

def Wan_Edge():
    try:
        resp = Sdwan.get_request(api = "device/reachable?personality=vedge")

        data = resp.json()
        dataa = data['data']
        k=''
        for x in dataa:
            k=k+str(x['reachability'])+','+str(x['host-name'])+','+str(x['system-ip'])+','+str(x['site-id'])+','+str(x['device-model'])+','+str(x['version'])+','+str(x['uuid'])+','+str(x['board-serial'])+','+str(x['lastupdated'])+';'
        print(k[:-1])
    except:
        print("Wrong")
        sys.exit()

Wan_Edge()
