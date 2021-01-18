import requests
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
        #GET SESSION 
        base_url_str = 'https://%s:8443/'%vmanage_ip
        login_action = 'j_security_check'        
        login_data = {'j_username' : username, 'j_password' : password}
        login_url = base_url_str + login_action
        url = base_url_str + login_url
        response = requests.post(url=login_url, data = login_data,verify=False)
        try:
            cookies = response.headers["Set-Cookie"]
            jsessionid = cookies.split(";")
            return(jsessionid[0])
        except:
            print(response.text)

    def get_token(self, vmanage_ip, jsessionid):
        #GET TOKEN
        headers = {'Cookie': jsessionid}
        base_url_str = 'https://%s:8443/'%vmanage_ip
        api = "dataservice/client/token"
        url = base_url_str + api
       
        response = requests.get(url = url, headers=headers,verify=False)
        if response.status_code == 200:
            
            return(response.text)
        else:
            return None
    

    
Sdwan = rest_api_lib(SDWAN_IP, SDWAN_USERNAME, SDWAN_PASSWORD)
jsessionid = Sdwan.login(SDWAN_IP, SDWAN_USERNAME, SDWAN_PASSWORD)
token = Sdwan.get_token(SDWAN_IP, jsessionid)

def reboot_History():
    
        headers ={'Cookie': jsessionid, 'X-XSRF-TOKEN':token, 'Content-Type': 'application/json'}
        payload={"templateId":"c566d38e-2219-4764-a714-4abeeab607dc","deviceIds":["CSR-807E37A3-537A-07BA-BD71-8FB76DE9DC38"],"isEdited":False,"isMasterEdited":False}
#payload = {"deviceTemplateList":[{"templateId":"c566d38e-2219-4764-a714-4abeeab607dc","device":[{"csv-status":"complete","csv-deviceId":"CSR-807E37A3-537A-07BA-BD71-8FB76DE9DC38","csv-deviceIP":"10.10.1.13","csv-host-name":"site1-cedge01","//system/host-name":"mantext","//system/system-ip":"10.10.1.113","//system/site-id":"1009","/1/vpn_1_if_name/interface/if-name":"GigabitEthernet3","/1/vpn_1_if_name/interface/description":"port.site1-sw01","/1/vpn_1_if_name/interface/ip/address":"10.10.21.1/24","/512/vpn-instance/ip/route/0.0.0.0/0/next-hop/vpn_512_next_hop_ip_address/address":"10.10.20.254","/512/vpn_512_if_name/interface/if-name":"GigabitEthernet1","/512/vpn_512_if_name/interface/description":"port.sbx-mgmt","/512/vpn_512_if_name/interface/ip/address":"10.10.20.175/24","/0/vpn-instance/ip/route/0.0.0.0/0/next-hop/vpn_0_next_hop_ip_address/address":"10.10.23.9","/0/vpn-instance/ip/route/0.0.0.0/0/next-hop/public_internet_vpn_0_next_hop_ip_address/address":"10.10.23.41","/0/internet_vpn_0_if_name/interface/if-name":"GigabitEthernet4","/0/internet_vpn_0_if_name/interface/description":"internet-link","/0/internet_vpn_0_if_name/interface/ip/address":"10.10.23.42/30","/0/vpn_0_if_name/interface/if-name":"GigabitEthernet2","/0/vpn_0_if_name/interface/description":"GigabitEthernet5.wan-rtr01","/0/vpn_0_if_name/interface/ip/address":"10.10.23.10/30","//system/gps-location/latitude":"35.852","//system/gps-location/longitude":"-78.869","csv-templateId":"c566d38e-2219-4764-a714-4abeeab607dc"}],"isEdited":False,"isMasterEdited":False}]}
        payload = json.dumps(payload)
        url = 'https://%s:8443/dataservice/'%SDWAN_IP
        api = 'template/device/config/input/'
        url = url + api
        resp = requests.post(url, headers=headers, data=payload, verify=False)
        data = resp.json()
        dataa = data['data']
        k=''
        for x in dataa:
          k=k+str(x.get('csv-deviceId',''))+','+str(x.get('csv-deviceIP',''))+','+str(x.get('csv-host-name',''))+','+str(x.get('//system/host-name',''))+','+str(x.get('//system/system-ip',''))+','+str(x.get('//system/site-id',''))+','+str(x.get('/1/vpn_1_if_name/interface/if-name',''))+','+str(x.get('/1/vpn_1_if_name/interface/description',''))+','+str(x.get('/1/vpn_1_if_name/interface/ip/address',''))+','+str(x.get('/512/vpn-instance/ip/route/0.0.0.0/0/next-hop/vpn_512_next_hop_ip_address/address',''))+','+str(x.get('/512/vpn_512_if_name/interface/if-name',''))+','+str(x.get('/512/vpn_512_if_name/interface/description',''))+','+str(x.get('/512/vpn_512_if_name/interface/ip/address',''))+','+str(x.get('/0/vpn-instance/ip/route/0.0.0.0/0/next-hop/vpn_0_next_hop_ip_address/address',''))+','+str(x.get('/0/vpn-instance/ip/route/0.0.0.0/0/next-hop/public_internet_vpn_0_next_hop_ip_address/address',''))+','+str(x.get('/0/internet_vpn_0_if_name/interface/if-name',''))+','+str(x.get('/0/internet_vpn_0_if_name/interface/description',''))+','+str(x.get('/0/internet_vpn_0_if_name/interface/ip/address',''))+','+str(x.get('/0/vpn_0_if_name/interface/if-name',''))+','+str(x.get('/0/vpn_0_if_name/interface/description',''))+','+str(x.get('/0/vpn_0_if_name/interface/ip/address',''))+','+str(x.get('//system/gps-location/latitude',''))+','+str(x.get('//system/gps-location/longitude',''))+';'
        print(k[:-1])

reboot_History()