from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.keys import Keys
import time
import os

PATH = "C:\Program Files (x86)\chromedriver.exe"
driver = webdriver.Chrome(PATH)

driver.get("http://localhost/Tourable/Tourable_pages/image-storage-display.php")

driver.implicitly_wait(5)

loc_name = driver.find_element_by_id("loc_name")
desc_name = driver.find_element_by_id("desc-box")
file_name = driver.find_element_by_id("file_name")

loc_name.send_keys("Meenakshi temple")
desc_name.send_keys("Historic Hindu Temple.")
file_name.send_keys(os.getcwd()+"/images/bg1.png")


# actions = ActionChains(driver)
# actions.move_to_element()
# actions.click()

