from bs4 import BeautifulSoup
import requests

URL = 'http://www.catpre.com/shop/goods/goods_post.php?goodsno=24978'
response = requests.get(URL)
soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')

page_list = soup.findAll("a", {"class": {'number'}})

for page_number in range(1, len(page_list)+1):
    URL = 'http://www.catpre.com/shop/goods/goods_post.php?goodsno=24978&page=' + str(page_number)
    response = requests.get(URL)
    soup = BeautifulSoup(response.content, 'html.parser', from_encoding='utf-8')
    writer_list = soup.findAll("span", {'class': {'name'}})
    esti_list = soup.findAll("span", {'class': {'ic-star'}})
    review_list = soup.findAll("p", {'class': {'comment comment-bg'}})
    idx = 0
    for esti in esti_list:
        score_string = esti.get_text().strip()
        score_string = score_string[:-1]
        score = float(score_string)
        if(score >= 4):
            print "장점|", writer_list[idx].get_text().strip(), "|", score, "|", review_list[idx].get_text().strip()
            idx = idx+1
        elif(score < 3):
            print "단점|", writer_list[idx].get_text().strip(), "|", score, "|", review_list[idx].get_text().strip()
            idx = idx+1
        else:
            print "기타|", writer_list[idx].get_text().strip(), "|", score, "|", review_list[idx].get_text().strip()
            idx = idx+1
