import pyshark
import selenium.webdriver
from wait_for import wait_for


def getCookies(cap):
    cookies = cap[0]['http'].get_field_value('Cookie').replace(' ','').split(';')
    return cookies


def getHost(cap):
    host = cap[0]['http'].get_field_value('HOST')
    return host


cap = pyshark.FileCapture('zad2.pcapng', display_filter='http.cookie')
cookies = getCookies(cap)
print(getHost(cap))
print(cookies)

driver = selenium.webdriver.Chrome()
driver.get("http://"+getHost(cap))
for c in cookies:
    x = c.split('=')
    print(x)
    driver.add_cookie({'name':x[0], 'value':x[1], 'path':'/'})
driver.refresh()

#Cookie: PHPSESSID=1d216d2e2aafa16b547ee1e41c6a4fce\r\n'''