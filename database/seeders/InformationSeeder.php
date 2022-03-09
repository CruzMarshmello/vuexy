<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Information;
use App\Models\InformationLocale;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $information = new Information();
        $information->sort_order = 0;
        $information->status = 'Enabled';
        $information->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'en';
        $informationLocale->title = 'Terms and Conditions';
        $informationLocale->slug = 'terms-and-conditions';
        $informationLocale->description = "<p><strong>1. WEBSITE TERMS AND CONDITIONS</strong></p>
                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. These are the Terms and Conditions (&ldquo;Terms&rdquo;) of your agreement with Jaspal Group (&ldquo;Jaspal&rdquo;) which apply to all products and/or services purchased by you from the Website. Please read the following Terms and Conditions carefully. If you visit, or continue to browse and use this Website, you are agreeing to comply with and be bound by the Website Terms and Conditions together with our Privacy Policy which govern Jaspal and its use by you in relation to this Website.</p>
                                        <p>Jaspal reserves the right to change the Terms from time to time at its sole discretion, and your rights under this agreement will be subject to the most current version of the Terms posted on this page at the time of your use or purchase. You and your company rely on the information contained on this Website at your own risk. If you do not agree with these or revised Terms of use, please discontinue your use of the Website. If you find an error or omission on this Website, please let us know.</p>
                                        <p>If you have any questions, comments or concerns arising from the Website, the Privacy Policy or any other relevant Terms and Conditions, policies and notices or the way in which we are handling your personal information please contact us.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>2. INFORMATION AND LICENSE</strong></p>
                                        <p>Jaspal grants you a limited license to access and make personal use of this Website and not to download or modify it, or any portion of it, except with express written consent of Jaspal. This license does not include any resale or commercial use of the Website or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of www.ccdoubleo.com or its contents; or any use of data mining, robots, or similar data gathering and extraction tools. The Website or any portion of it may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of Jaspal.</p>
                                        <p>Jaspal attempts to be as accurate as possible in its product descriptions. However, Jaspal does not warrant that product and price descriptions or other content of this Website are accurate, complete, reliable, current, or error-free. Neither Jaspal nor any third party or data or content provider make any representations or warranties, whether express, implied in law or residual, as to the sequence, accuracy, completeness or reliability of information, opinions, any pricing information, research information, data and/or content contained on the Website (including but not limited to any information which may be provided by any third party or data or content providers) and shall not be bound in any manner by any information contained on the Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>3. INTELLECTUAL PROPERTY</strong></p>
                                        <p>The copyrights, trademarks, names, graphics, designs, logos, service marks, service names, scripts, commercial markings, and trade dress (collectively Intellectual Property) displayed on this Website are all registered and unregistered intellectual properties of Jaspal or its licensors, sponsors or suppliers and are protected by intellectual property laws. Nothing contained on this Website should be construed as granting any license or right to use any intellectual property without the prior written permission of Jaspal.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>4. EXTERNAL LINKS</strong></p>
                                        <p>External links may be provided for your convenience, but they are beyond the control of www.ccdoubleo.com and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk. When visiting external links you must refer to the terms and conditions of use for that external Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>5. PUBLIC FORUMS AND USER SUBMISSIONS</strong></p>
                                        <p>Jaspal is not responsible for any material submitted to the public areas by you (which include bulletin boards, hosted pages, chat rooms, or any other public area found on the Website. Any material (whether submitted by you or any other user) is not endorsed, reviewed or approved by Jaspal. We reserve the right to remove any material submitted or posted by you in the public areas, without notice to you, if it becomes aware and determines, in its sole and absolute discretion that you are or there is the likelihood that you may, including but not limited to:</p>
                                        <p>5.1 defame, abuse, harass, stalk, threaten or otherwise violate the rights of other users or any third parties;</p>
                                        <p>5.2 publish, post, distribute or disseminate any defamatory, obscene, indecent or unlawful material or information;</p>
                                        <p>5.3 post or upload files that contain viruses, corrupted files or any other similar software or programs that may damage the operation of Jaspal and/or a third party computer system and/or network;</p>
                                        <p>5.4 violate any copyright, trade mark, other applicable Thailand or international laws or intellectual property rights of Jaspal or any other third party;</p>
                                        <p>5.5 submit content containing marketing or promotional material which is intended to solicit business.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>6. MEMBERSHIP</strong></p>
                                        <p>Jaspal Website is not available to users under the age of 13, outside the demographic target, or to any members previously banned by Jaspal. Users are allowed only one active account. Breeching these conditions could result in account termination.</p>
                                        <p>Jaspal on occasion will offer its members promotions. In connection with these promotions, any user that receives Rewards (prizes, credits, gift cards, coupons or other benefits) from Jaspal through the use of multiple accounts, email addresses, falsified information or fraudulent conduct, shall forfeit any Rewards gained through such activity and may be liable for civil and/or criminal penalties by law.</p>
                                        <p>By using the Jaspal Website, you acknowledge that you are of legal age to form a binding contract and are not a person barred from receiving services under the laws of the Thailand or other applicable jurisdiction. You agree to provide true and accurate information about yourself when requested by Jaspal Website. If you provide any information that is untrue, inaccurate, or incomplete, Jaspal has the right to suspend or terminate your account and refuse future use of its services. You are responsible for maintaining the confidentiality of your account and password, and accept all responsible for activities that occur under your account.</p>
                                        <p>Any benefits or rewards offered through the Website are at the discretion of Jaspal. Jaspal has the right to modify or discontinue, temporarily or permanently, the services offered at its sole discretion, with or without prior notice to its members.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>7. COMMUNICATIONS AND OTHER CONTENT</strong></p>
                                        <p>You may submit suggestions, ideas, comments, questions, or other information to us so long as the content is not illegal, obscene, threatening, defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable and does not consist of or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or any form of spam. You may not use a false e-mail address, impersonate any person or entity, or otherwise mislead as to the origin of any content.</p>
                                        <p>If you do submit material, you automatically grant Jaspal and its affiliates a nonexclusive, royalty-free, perpetual, irrevocable, and fully sub-licensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content in any media throughout the world.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>8. CANCELLATION DUE TO ERRORS</strong></p>
                                        <p>Jaspal has the right to cancel an order at anytime due to typographical or unforeseen errors that results in the product(s) on the site being listed inaccurately (having the wrong price or descriptions etc.). In the event a cancellation occurs and payment for the order has been received, Jaspal shall issue a full refund for the product in the amount in question.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>9. CANCELLATIONS AND RETURNS</strong></p>
                                        <p>Orders can be cancelled if their products have not yet be delivered. Once products are delivered to the users account, they are no longer permitted to cancel. Any returns after that are handled on a case-by-case basis. Within reason, we will do what we can to ensure customer satisfaction. Unless there is something wrong with the purchase, we are generally unable to offer refunds.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>9. SPECIFIC USE</strong></p>
                                        <p>You further agree not to use the Website to send or post any message or material that is unlawful, harassing, defamatory, abusive, indecent, threatening, harmful, vulgar, obscene, sexually orientated, racially offensive, profane, pornographic or violates any applicable law and you hereby indemnify Jaspal against any loss, liability, damage or expense of whatever nature which Jaspal or any third party may suffer which is caused by or attributable to, whether directly or indirectly, your use of the Website to send or post any such message or material.</p>
                                        <p>10. DISCLAIMER OF WARRANTIES AND LIMTATION OF LIABILITY</p>
                                        <p>This website and all information contained herein are provided by Jaspal on an as is and as available basis. Jaspal makes no representations or warranties of any kind, express or implied, as to the operation and availability of this website or the information, content, materials, or products presented on the website. You expressly agree that your use of this website is at your sole risk. To the full extent permissible by applicable law, Jaspal disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose. Jaspal does not warrant that the website, its servers, or e-mail sent from Jaspal are free of viruses or other harmful components or errors. Jaspal will not be liable for any damages of any kind arising from the use of this website, including, but not limited to direct, indirect, incidental, punitive, and consequential damages.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>9. INDEMNIFICATION</strong></p>
                                        <p>Jaspal makes no warranties, representations, statements or guarantees (whether express, implied in law or residual) regarding the Website, the information contained on the Website, you or your company's personal information or material and information transmitted over our system.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>12. PRIVACY AND SECURITY</strong></p>
                                        <p>Please review our Privacy Policy containing our privacy and security practices, which also governs your visit to the Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>13. ENTIRE AGREEMENT</strong></p>
                                        <p>These Terms and Conditions constitute the sole record of the agreement between you and Jaspal in relation to your use of the Website. Neither you nor Jaspal shall be bound by any expressed or implied representation, warranty, or promise not recorded herein. Unless otherwise specifically stated, these Terms supersede and replace all prior commitments, undertakings or representations, whether written or oral, between you and Jaspal in respect of your use of the Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>14. CONFLICT</strong></p>
                                        <p>Where any conflict or contradiction appears between the provisions of these Website terms and conditions and any other relevant terms and conditions, policies or notices, the other relevant terms and conditions, policies or notices which relate specifically to a particular section or module of the Website shall prevail in respect of your use of the relevant section or module of the Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>15. WAIVER</strong></p>
                                        <p>No indulgence or extension of time which either you or Jaspal may grant to the other will constitute a waiver of or, whether by law or otherwise, limit any of the existing or future rights of the grantor in terms hereof, save in the event or to the extent that the grantor has signed a written document expressly waiving or limiting such rights.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>16. CESSION</strong></p>
                                        <p>Jaspal shall be entitled to cede, assign and delegate all or any of its rights and obligations in terms of any relevant terms and conditions, policies and notices to any third party.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>17. SEVERABILITY</strong></p>
                                        <p>All provisions of any relevant terms and conditions, policies and notices are, notwithstanding the manner in which they have been grouped together or linked grammatically, severable from each other. Any provision of any relevant terms and conditions, policies and notices, which is or becomes unenforceable in any jurisdiction, whether due to void, invalidity, illegality, unlawfulness or for any reason whatever, shall, in such jurisdiction only and only to the extent that it is so unenforceable, be treated as pro non-scripto and the remaining provisions of any relevant terms and conditions, policies and notices shall remain in full force and effect.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>18. GOVERNING LAW; EXCLUSIVE JURISDICTION</strong></p>
                                        <p>This Agreement shall be governed by and construed in accordance with the laws of the Kingdom of Thailand, without giving effect to its conflict of law rules and applicable Thai law. In the event of any dispute hereunder, you and Jaspal hereby consent to the exclusive jurisdiction and venue of the courts of the Kingdom of Thailand. The parties expressly disclaim the application of the United Nations Convention on Contracts for the International Sale of Goods.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>19. TERMINATION</strong></p>
                                        <p>These terms and conditions are applicable to you upon your accessing the Website and/or completing the registration or shopping process. These terms and conditions, or any of them, may be modified or terminated by Jaspal without notice at any time for any reason. The provisions relating to Copyrights and Trademarks, Disclaimer, Claims, Limitation of Liability, Indemnification, Applicable Laws, Arbitration and General, shall survive any termination.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>20. FORCE MAJEURE</strong></p>
                                        <p>Jaspal shall have no liability to you for any delay or failure in carrying out its obligations to any customer for reasons beyond Jaspal&rsquo;s control, including without limitation, acts of God, war or terrorism, natural disasters, charges in or compliance with laws, regulations or governmental policies and shortages of supplies and services. Jaspal may extend delivery of an order so affected without liability to the customer except for the return of any payment made by the customer to Jaspal with respect to any undelivered portion of the order so canceled.</p>
                                        <p>&nbsp;</p>
                                        <h2><strong>PRIVACY POLICY</strong></h2>
                                        <p><strong>1. INTRODUCTION</strong></p>
                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. We value our customers' privacy and appreciate your confidence that we will respect your privacy in a careful and sensible manner. By visiting the Website and/or using the products and services made available to you on the Website, you are agreeing to the terms of this Privacy Policy. Please read this policy carefully.</p>
                                        <p>Jaspal reserves the right to change the Privacy Policy from time to time at its sole discretion, and your rights under this agreement will be subject to the most current version of the policy posted on this page at the time of your use or purchase. By using or continuing to use the Website, you are accepting the practices described in the most current version of this Privacy Policy.</p>
                                        <p>If you have any questions, comments or concerns arising from the Website, the Privacy Policy or any other relevant Terms and Conditions, policies and notices or the way in which we are handling your personal information please contact us.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>2. COLLECTION AND STORAGE OF INFORMATION</strong></p>
                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. We value our customers' privacy and appreciate your confidence that we will respect your privacy in a careful and sensible manner. By visiting the Website and/or using the products and services made available to you on the Website, you are agreeing to the terms of this Privacy Policy. Please read this policy carefully.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>3. USAGE AND SHARING OF INFORMATION COLLECTED</strong></p>
                                        <p>Jaspal may share customer information only on a limited basis and with our parent company and affiliates. We share it on a limited basis with agents we use from time to time to send postal mail and e-mail, remove repetitive information from customer lists, analyze data, provide marketing assistance, and provide customer service.</p>
                                        <p>We use information about our customers for the specific purpose for which it was volunteered. In addition, if you supply us with your postal address online, you may receive periodic mailings from us with information regarding a new collection, new products, new store locations, or upcoming promotional offers or events.</p>
                                        <p>Jaspal may also share information with governmental agencies or other companies assisting us in fraud prevention or investigation. We may do so when: (1) permitted or required by law; or, (2) trying to protect against or prevent actual or potential fraud or unauthorized transactions; or, (3) investigating fraud which has already taken place. The information is not provided to these companies for marketing purposes.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>4. COOKIES</strong></p>
                                        <p>Jaspal uses cookies and web beacons (also referred to as Web bugs, pixel tags or clear GIFs) to manage the Website and e-mail programs. We do not use cookies or web beacons to collect or store personal information. Cookies and web beacons help us understand how consumers use the Website and e-mail and measure the effectiveness of our online advertising so we can design better services in the future.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>5. CHILDREN'S PRIVACY</strong></p>
                                        <p>This Website is not intended for children under the age of 13, and Jaspal does not knowingly request and collect personally identifiable information online from anyone under the age of 13 without prior verifiable parental consent.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>6. COMMITMENT TO DATA SECURITY</strong></p>
                                        <p>Your personally identifiable information is kept secure. Only authorized employees, agents and contractors (who have agreed to keep information secure and confidential) will have access to this information. All emails and newsletters from this site allow you to opt-out of further mailings.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>7. CHANGES TO YOUR PERSONAL INFORMATION</strong></p>
                                        <p>If you wish to make any changes to the information you provided, please take the following actions: Please enter the website using the account in which you wish to change the information. - Click on &ldquo;user account&rdquo; - Choose the menu &ldquo;change personal information&rdquo; which will be on a menu tab located on the left of your screen - Click on &ldquo;save&rdquo; Or email us at contact@ccdoubleo.com.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>8. LINKS TO THIRD PARTY WEBSITES</strong></p>
                                        <p>External links may be provided for your convenience, but they are beyond the control of www.ccdoubleo.com and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk. When visiting external links you must refer to the privacy policy and terms of use for that external Website.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>9. UNSUBSCRIBE NEWSLETTER</strong></p>
                                        <p>If you are not willing to receive newsletter from us, you can modify your e-mail subscriptions by unsubscribing to our email lists through various channels on the Website or by unsubscribing through the emails/newsletters that you receive.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>10. PRIVACY CONTACT INFORMATION</strong></p>
                                        <p>If you have any questions regarding our Privacy Policy, please contact us at: Jaspal Company Limited 1054 Soi Sukhumvit 66/1 Bangchak, Prakanong, 10260 Tel: 02-367-2055-6 Or email us at contact@ccdoubleo.com We reserve the right to make changes to this policy. Any changes to this policy will be posted on the Website.</p>";
        $informationLocale->meta_title = 'Terms and Conditions';
        $informationLocale->meta_keyword = 'terms,conditions';
        $informationLocale->meta_description = 'Welcome to www.ccdoubleo.com (the "Website"), operated by Jaspal Group and its subsidiaries and affiliates. These are the Terms and Conditions (“Terms”) of your agreement with Jaspal Group (“Jaspal”) which apply to all products and/or services purchased by you from the Website. Please read the following Terms and Conditions carefully. If you visit, or continue to browse and use this Website, you are agreeing to comply with and be bound by the Website Terms and Conditions together with our Privacy Policy which govern Jaspal and its use by you in relation to this Website.';
        $informationLocale->information_id = 1;
        $informationLocale->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'th';
        $informationLocale->title = 'ข้อกำหนด และ นโยบาย';
        $informationLocale->slug = 'ข้อกำหนด-และ-นโยบาย';
        $informationLocale->description = "<p><strong>1. บทนำ</strong></p>
                                        <p>เหล่านี้เป็นข้อกำหนดและเงื่อนไขของข้อตกลงของเราซึ่งใช้กับการซื้อผลิตภัณฑ์ทั้งหมดของคุณจาก www.ccdoubleo.com ดำเนินการโดย Jaspal Group รวมถึง บริษัท ในเครือและ บริษัท ในเครือที่ให้บริการแก่คุณ (ในที่นี้เรียกว่า เว็บไซต์) ภายใต้ เงื่อนไขต่อไปนี้ โปรดอ่านข้อกำหนดต่อไปนี้อย่างละเอียด หากคุณไม่ยอมรับข้อกำหนดและเงื่อนไขดังต่อไปนี้คุณไม่สามารถเข้าหรือใช้เว็บไซต์นี้ หากคุณยังคงเรียกดูและใช้เว็บไซต์นี้คุณตกลงที่จะปฏิบัติตามและผูกพันตามข้อกำหนดและเงื่อนไขการใช้งานต่อไปนี้ซึ่งรวมถึงนโยบายความเป็นส่วนตัวของเราจะบังคับ Jaspal และการใช้งานเว็บไซต์ของคุณที่เกี่ยวข้องกับเว็บไซต์นี้.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>2. ข้อมูลและรายละเอียดสินค้า</strong></p>
                                        <p>ในขณะที่มีความพยายามทุกวิถีทางในการอัพเดทข้อมูลที่มีอยู่ในเว็บไซต์นี้ Jaspal หรือบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหาไม่สามารถรับรองหรือรับประกันใด ๆ ไม่ว่าจะโดยชัดแจ้งโดยนัยในกฎหมายหรือสิ่งที่เหลือ ข้อมูลความคิดเห็นข้อมูลการกำหนดราคาข้อมูลการวิจัยข้อมูลและ / หรือเนื้อหาที่มีอยู่ในเว็บไซต์ (รวมถึง แต่ไม่ จำกัด เฉพาะข้อมูลใด ๆ ที่อาจจัดทำโดยบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหา) และจะไม่ผูกพันใด ๆ ลักษณะโดยข้อมูลใด ๆ ที่มีอยู่ในเว็บไซต์.</p>
                                        <p>Jaspal ขอสงวนสิทธิ์ในการเปลี่ยนแปลงหรือยกเลิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้าลักษณะหรือคุณสมบัติของเว็บไซต์นี้ ไม่มีข้อมูลใดที่จะถูกตีความว่าเป็นคำแนะนำและข้อมูลที่นำเสนอเพื่อจุดประสงค์ในการให้ข้อมูลเท่านั้นและไม่ได้มีวัตถุประสงค์เพื่อการค้า คุณและ บริษัท ของคุณต้องพึ่งพาข้อมูลที่มีอยู่ในเว็บไซต์นี้ด้วยความเสี่ยงของคุณเอง หากคุณพบข้อผิดพลาดหรือการละเว้นที่เว็บไซต์นี้โปรดแจ้งให้เราทราบ.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>3. เครื่องหมายการค้าและลิขสิทธิ์</strong></p>
                                        <p>เครื่องหมายการค้าชื่อโลโก้และเครื่องหมายบริการ (รวมเรียกว่า เครื่องหมายการค้า) ที่ปรากฏบนเว็บไซต์นี้เป็นเครื่องหมายการค้าจดทะเบียนและไม่จดทะเบียนของ Jaspal ไม่มีสิ่งใดในเว็บไซต์นี้ที่ถูกตีความว่าเป็นการให้อนุญาตหรือสิทธิ์ในการใช้เครื่องหมายการค้าใด ๆ โดยไม่ได้รับอนุญาตเป็นลายลักษณ์อักษรจาก Jaspal.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>4. ลิงค์จากภายนอก</strong></p>
                                        <p>อาจมีลิงก์ภายนอกเพื่อความสะดวกของคุณ แต่มันอยู่นอกเหนือการควบคุมของ www.ccdoubleo.com และไม่มีการแสดงเนื้อหาของพวกเขา การใช้หรือการอ้างอิงลิงค์ภายนอกใด ๆ และเนื้อหาที่ให้ไว้นั้นเป็นความเสี่ยงของคุณเอง เมื่อเยี่ยมชมลิงค์ภายนอกคุณต้องอ้างถึงข้อกำหนดและเงื่อนไขการใช้งานสำหรับเว็บไซต์ภายนอกนั้น ห้ามสร้างลิงก์ไฮเปอร์เท็กซ์จากเว็บไซต์ใด ๆ ที่ควบคุมโดยคุณหรืออย่างอื่นไปยังเว็บไซต์นี้โดยไม่ได้รับอนุญาตเป็นลายลักษณ์อักษรล่วงหน้าจาก Jaspal กรุณาติดต่อเราหากคุณต้องการที่จะเชื่อมโยงไปยังเว็บไซต์นี้หรือต้องการที่จะขอลิงค์ไปยังเว็บไซต์ของคุณ.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>5. ฟอรัมสาธารณะและข้อมูลที่ส่งโดยผู้ใช้</strong></p>
                                        <p>Jaspal จะไม่รับผิดชอบต่อเนื้อหาใด ๆ ที่ส่งไปยังพื้นที่สาธารณะโดยคุณ (ซึ่งรวมถึงกระดานข่าวหน้าโฮสต์ห้องแชทหรือพื้นที่สาธารณะอื่น ๆ ที่พบในเว็บไซต์เนื้อหาใด ๆ (ไม่ว่าจะส่งโดยคุณหรือผู้ใช้รายอื่น) รับรองตรวจสอบหรืออนุมัติโดย Jaspal เราขอสงวนสิทธิ์ในการลบเนื้อหาใด ๆ ที่ส่งหรือโพสต์โดยคุณในพื้นที่สาธารณะโดยไม่ต้องแจ้งให้คุณทราบหากมีการรับรู้และพิจารณาตามดุลยพินิจของคุณ แต่เพียงผู้เดียว โอกาสที่คุณอาจรวมถึง แต่ไม่ จำกัด เพียง</p>
                                        <p>5.1 ทำให้เสียชื่อเสียงล่วงละเมิดก่อกวนคุกคามหรือละเมิดสิทธิ์ของผู้ใช้รายอื่นหรือบุคคลที่สามใด ๆ;</p>
                                        <p>5.2 เผยแพร่โพสต์แจกจ่ายหรือเผยแพร่เนื้อหาหรือข้อมูลที่ทำให้เสื่อมเสียชื่อเสียงลามกอนาจารหรือไม่ชอบด้วยกฎหมาย;</p>
                                        <p>5.3 โพสต์หรืออัปโหลดไฟล์ที่มีไวรัสไฟล์ที่เสียหายหรือซอฟต์แวร์หรือโปรแกรมอื่นที่คล้ายคลึงกันซึ่งอาจทำให้การทำงานของ Jaspal และ / หรือระบบคอมพิวเตอร์ของบุคคลที่สามและ / หรือเครือข่าย;</p>
                                        <p>5.4 ละเมิดลิขสิทธิ์เครื่องหมายการค้าใด ๆ ที่เกี่ยวข้องในประเทศไทยหรือกฎหมายระหว่างประเทศหรือสิทธิในทรัพย์สินทางปัญญาของ Jaspal หรือบุคคลที่สามอื่น ๆ;</p>
                                        <p>5.5 ส่งเนื้อหาที่มีเนื้อหาด้านการตลาดหรือส่งเสริมการขายซึ่งมีวัตถุประสงค์เพื่อชักชวนธุรกิจ.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>6. การเป็นสมาชิก</strong></p>
                                        <p>เว็บไซต์ Jaspal ไม่สามารถให้บริการแก่ผู้ใช้ที่มีอายุต่ำกว่า 18 ปีซึ่งอยู่นอกเป้าหมายด้านประชากรศาสตร์หรือแก่สมาชิกใด ๆ ที่ Jaspal ห้ามไว้ก่อนหน้านี้ ผู้ใช้จะได้รับอนุญาตเพียงหนึ่งบัญชีที่ใช้งานอยู่ การตกลงเงื่อนไขเหล่านี้อาจทำให้บัญชีถูกยกเลิก.</p>
                                        <p>Jaspal ในบางโอกาสจะเสนอโปรโมชั่นสำหรับสมาชิก ในการเชื่อมต่อกับโปรโมชั่นเหล่านี้ผู้ใช้ที่ได้รับรางวัล (รางวัลเครดิตบัตรของขวัญคูปองหรือผลประโยชน์อื่น ๆ ) จาก Jaspal ผ่านการใช้หลายบัญชีที่อยู่อีเมลข้อมูลปลอมหรือการกระทำที่หลอกลวงจะต้องริบรางวัลใด ๆ ที่ได้รับผ่านกิจกรรมดังกล่าว และอาจต้องรับผิดทั้งทางแพ่งและ / หรือทางอาญาตามกฎหมาย.</p>
                                        <p>ในการใช้เว็บไซต์ Jaspal คุณรับทราบว่าคุณมีอายุถึงเกณฑ์ตามกฎหมายในการทำสัญญาที่มีผลผูกพันและไม่ใช่บุคคลที่ถูกห้ามไม่ให้รับบริการภายใต้กฎหมายของประเทศไทยหรือเขตอำนาจศาลอื่นที่เกี่ยวข้อง คุณตกลงที่จะให้ข้อมูลที่ถูกต้องเกี่ยวกับตัวคุณเมื่อเว็บไซต์ Jaspal ร้องขอ หากคุณให้ข้อมูลใด ๆ ที่ไม่เป็นความจริงไม่ถูกต้องหรือไม่สมบูรณ์ Jaspal มีสิทธิ์ในการระงับหรือยกเลิกบัญชีของคุณและปฏิเสธการใช้บริการในอนาคต คุณมีความรับผิดชอบในการรักษาความลับของบัญชีและรหัสผ่านของคุณและยอมรับทุกความรับผิดชอบต่อกิจกรรมที่เกิดขึ้นภายใต้บัญชีของคุณ.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>7. การยกเลิกเนื่องจากข้อผิดพลาด</strong></p>
                                        <p>Jaspal มีสิทธิ์ที่จะยกเลิกคำสั่งซื้อได้ตลอดเวลาเนื่องจากข้อผิดพลาดในการพิมพ์หรือที่ไม่คาดฝันส่งผลให้ผลิตภัณฑ์ในเว็บไซต์ที่มีการระบุรายการไม่ถูกต้อง (มีราคาหรือคำอธิบายที่ผิด ฯลฯ ) ในกรณีที่มีการยกเลิกและการชำระเงินสำหรับคำสั่งซื้อที่ได้รับ Jaspal จะคืนเงินเต็มจำนวนสำหรับผลิตภัณฑ์ตามจำนวนที่มีปัญหา.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>8. การใช้งานเฉพาะ</strong></p>
                                        <p>นอกจากนี้คุณตกลงที่จะไม่ใช้เว็บไซต์นี้เพื่อส่งหรือโพสต์ข้อความหรือเนื้อหาใด ๆ ที่ผิดกฎหมาย, ล่วงละเมิด, หมิ่นประมาท, ดูหมิ่นเหยียดหยาม, ไม่เหมาะสม, ข่มขู่, เป็นอันตราย, หยาบคาย, หยาบคาย, หยาบคาย, หยาบคายทางเพศ และคุณขอชดใช้ค่าเสียหายจาก Jaspal ต่อการสูญเสียความรับผิดความเสียหายหรือค่าใช้จ่ายใด ๆ ที่ Jaspal หรือบุคคลที่สามอาจประสบซึ่งเกิดจากหรือเนื่องมาจากการใช้งานเว็บไซต์ของคุณเพื่อส่งหรือโพสต์ข้อความใด ๆ หรือวัสดุ.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>9. การรับประกัน</strong></p>
                                        <p>Jaspal ไม่รับประกันการรับรองแถลงการณ์หรือการรับประกัน (ไม่ว่าโดยชัดแจ้งโดยนัยทางกฎหมายหรือส่วนที่เหลือ) เกี่ยวกับเว็บไซต์ข้อมูลที่มีอยู่ในเว็บไซต์คุณหรือข้อมูลส่วนบุคคลของ บริษัท หรือวัสดุและข้อมูลที่ส่งผ่านระบบของเรา.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>10. คำปฏิเสธ</strong></p>
                                        <p>Jaspal จะไม่รับผิดชอบและรับผิดชอบต่อความสูญเสียความรับผิดความเสียหายใด ๆ (ไม่ว่าทางตรงทางอ้อมหรือผลสืบเนื่อง) การบาดเจ็บส่วนบุคคลหรือค่าใช้จ่ายในลักษณะใด ๆ ก็ตามที่คุณหรือบุคคลที่สามอาจได้รับความเดือดร้อน (รวมถึง บริษัท ของคุณ) นอกเหนือจากผลลัพธ์หรือซึ่งอาจเป็นผลโดยตรงหรือโดยอ้อมต่อการเข้าถึงและการใช้งานเว็บไซต์ของคุณข้อมูลใด ๆ ที่มีอยู่ในเว็บไซต์คุณหรือข้อมูลส่วนบุคคลของ บริษัท ของคุณหรือวัสดุและข้อมูลที่ส่งผ่านระบบของเรา โดยเฉพาะอย่างยิ่ง Jaspal หรือบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหาจะไม่รับผิดชอบใด ๆ ต่อคุณหรือกับบุคคลอื่น บริษัท หรือ บริษัท ใด ๆ สำหรับการสูญเสียความรับผิดความเสียหาย (ไม่ว่าโดยตรงหรือเป็นผลสืบเนื่อง) การบาดเจ็บหรือค่าใช้จ่าย ไม่ว่าในลักษณะใด ๆ ก็ตามที่เกิดขึ้นจากความล่าช้าความไม่ถูกต้องข้อผิดพลาดหรือการละเว้นข้อมูลราคาหุ้นหรือการส่งผ่านข้อมูลหรือการกระทำใด ๆ ที่เกิดขึ้นโดยอาศัยเหตุผลหรือด้วยเหตุนี้หรือด้วยเหตุผลที่ไม่ใช่ประสิทธิภาพหรือขัดจังหวะ.</p>
                                        <p>www.ccdoubleo.com เครดิตผู้อ้างอิงและโปรแกรมรางวัลและสิทธิประโยชน์นั้นขึ้นอยู่กับดุลยพินิจของ Jaspal Jaspal มีสิทธิ์ในการแก้ไขหรือยกเลิกบริการชั่วคราวหรือถาวรที่ให้บริการรวมถึงระดับคะแนนทั้งหมดหรือบางส่วนด้วยเหตุผลใดก็ตามขึ้นอยู่กับดุลยพินิจของสมาชิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้า Jaspal อาจเพิกถอน จำกัด หรือปรับเปลี่ยนเหนือสิ่งอื่นใด เพิ่มและลดเครดิตที่จำเป็นสำหรับข้อเสนอพิเศษใด ๆ ที่เกี่ยวข้องกับเครดิตผู้อ้างอิงและโปรแกรมรางวัล โดยการเป็นสมาชิกของ www.ccdoubleo.com คุณยอมรับว่า www.ccdoubleo.com เครดิตโปรแกรมการอ้างอิงและรางวัลจะไม่รับผิดชอบต่อคุณหรือบุคคลที่สามใด ๆ สำหรับการเปลี่ยนแปลงหรือการหยุดโปรแกรมดังกล่าว.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>11. การป้องกัน</strong></p>
                                        <p>ผู้ใช้ตกลงที่จะชดใช้ค่าเสียหายและไม่ถือ Jaspal (และพนักงาน, กรรมการ, ซัพพลายเออร์, บริษัท ย่อย, กิจการร่วมค้าและพันธมิตรทางกฎหมาย) จากการเรียกร้องหรือความต้องการใด ๆ รวมถึงค่าธรรมเนียมทนายความที่สมเหตุสมผลจากและต่อการสูญเสียค่าใช้จ่ายความเสียหายและค่าใช้จ่ายที่เกิดจากการละเมิดข้อกำหนดและเงื่อนไขเหล่านี้หรือกิจกรรมใด ๆ ที่เกี่ยวข้องกับบัญชีสมาชิกของผู้ใช้เนื่องจากการกระทำที่ประมาทเลินเล่อหรือผิดกฎหมาย.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>12. การใช้งานเว็บไซต์</strong></p>
                                        <p>Jaspal ไม่รับประกันหรือรับรองว่าข้อมูลในเว็บไซต์นั้นเหมาะสมสำหรับใช้ในเขตอำนาจศาลใด ๆ (นอกเหนือจากราชอาณาจักรไทย) ในการเข้าถึงเว็บไซต์คุณรับรองและรับรองต่อ Jaspal ว่าคุณมีสิทธิ์ตามกฎหมายที่จะทำเช่นนั้นและเพื่อใช้ประโยชน์จากข้อมูลที่มีให้ผ่านทางเว็บไซต์.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>13. ทั่วไป</strong></p>
                                        <p>13.1 ข้อตกลงทั้งหมด . ข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้ถือเป็นการบันทึกข้อตกลงระหว่างคุณกับ Jaspal แต่เพียงผู้เดียวซึ่งเกี่ยวข้องกับการใช้งานเว็บไซต์ของคุณ ทั้งคุณและ Jaspal จะไม่ผูกพันกับการเป็นตัวแทนการรับประกันหรือสัญญาที่ไม่ได้ระบุไว้ ข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้มีผลแทนที่และแทนที่ข้อผูกพันการรับรองหรือการเป็นตัวแทนก่อนหน้านี้ไม่ว่าจะเป็นลายลักษณ์อักษรหรือด้วยวาจาระหว่างคุณและ Jaspal เกี่ยวกับการใช้งานเว็บไซต์ของคุณ.</p>
                                        <p>13.2 การเปลี่ยนแปลง . Jaspal อาจแก้ไขข้อกำหนดและเงื่อนไขนโยบายหรือประกาศที่เกี่ยวข้องได้ตลอดเวลา คุณรับทราบว่าโดยการเยี่ยมชมเว็บไซต์เป็นครั้งคราวคุณจะผูกพันกับเวอร์ชันปัจจุบันของข้อกำหนดและเงื่อนไขที่เกี่ยวข้อง (เวอร์ชันปัจจุบัน) และเว้นแต่จะระบุไว้ในเวอร์ชันปัจจุบันเวอร์ชั่นก่อนหน้านี้ทั้งหมดจะถูกแทนที่โดย รุ่นปัจจุบัน คุณจะต้องรับผิดชอบในการตรวจสอบเวอร์ชันปัจจุบันทุกครั้งที่คุณเยี่ยมชมเว็บไซต์.</p>
                                        <p>13.3 ขัดแย้ง . ในกรณีที่ความขัดแย้งหรือความขัดแย้งปรากฏขึ้นระหว่างบทบัญญัติของข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้และข้อกำหนดและเงื่อนไขนโยบายหรือประกาศอื่น ๆ ที่เกี่ยวข้องข้อกำหนดและเงื่อนไขนโยบายหรือประกาศอื่น ๆ ที่เกี่ยวข้องซึ่งเกี่ยวข้องกับส่วนหรือโมดูลของเว็บไซต์โดยเฉพาะ เหนือกว่าด้วยการใช้งานส่วนหรือโมดูลที่เกี่ยวข้องของเว็บไซต์ของคุณ.</p>
                                        <p>13.4 การสละสิทธิ . ไม่มีการปล่อยตัวหรือขยายเวลาที่คุณหรือ Jaspal อาจมอบให้กับผู้อื่นจะเป็นการสละสิทธิ์หรือไม่ว่าจะตามกฎหมายหรือมิฉะนั้นให้ จำกัด สิทธิ์ที่มีอยู่หรือในอนาคตของผู้อนุญาตในแง่นี้บันทึกไว้ในเหตุการณ์หรือ ขอบเขตที่ผู้อนุญาตได้ลงนามในเอกสารเป็นลายลักษณ์อักษรอย่างชัดแจ้งการสละสิทธิ์หรือ จำกัด สิทธิดังกล่าว.</p>
                                        <p>13.5 การยอมยกให้. Jaspal shall be entitled to cede, assign and delegate all or any of its rights and obligations in terms of any relevant terms and conditions, policies and notices to any third party.</p>
                                        <p>13.6 การเป็นโมฆะ. บทบัญญัติทั้งหมดของข้อกำหนดและเงื่อนไขนโยบายและประกาศใด ๆ ที่เกี่ยวข้องแม้จะมีลักษณะที่จัดกลุ่มเข้าด้วยกันหรือเชื่อมโยงทางไวยากรณ์สามารถแยกจากกันได้ บทบัญญัติใด ๆ ของข้อกำหนดและเงื่อนไขนโยบายและประกาศที่เกี่ยวข้องหรือกลายเป็นไม่มีผลบังคับใช้ในเขตอำนาจศาลใด ๆ ไม่ว่าจะเนื่องมาจากความว่างเปล่าความไม่ถูกกฎหมายความผิดกฏหมายหรือด้วยเหตุผลใดก็ตามก็ตามในเขตอำนาจศาลดังกล่าวเท่านั้น มันไม่มีผลบังคับใช้ดังนั้นจะถือว่าเป็นโปรที่ไม่ใช่สคริปต์และบทบัญญัติที่เหลืออยู่ของข้อกำหนดและเงื่อนไขนโยบายและประกาศใด ๆ ที่เกี่ยวข้องจะยังคงมีผลบังคับใช้อย่างเต็มที่และมีผลบังคับใช้.</p>
                                        <p>13.7 กฎหมายที่ใช้บังคับ. ข้อกำหนดและเงื่อนไขนโยบายและประกาศที่เกี่ยวข้องใด ๆ จะอยู่ภายใต้และตีความตามกฎหมายของประเทศไทยโดยไม่ส่งผลกระทบต่อหลักการของความขัดแย้งทางกฎหมาย คุณยินยอมในเขตอำนาจศาลพิเศษของศาลสูงแห่งประเทศไทยในส่วนที่เกี่ยวกับข้อพิพาทใด ๆ ที่เกิดขึ้นเกี่ยวกับเว็บไซต์หรือข้อกำหนดและเงื่อนไขนโยบายและประกาศหรือสิ่งใด ๆ ที่เกี่ยวข้องหรือเกี่ยวข้องกับหรือเกี่ยวข้อง.</p>
                                        <p>13.8 ความเห็นหรือคำถาม . หากคุณมีคำถามความคิดเห็นหรือข้อกังวลใด ๆ ที่เกิดขึ้นจากเว็บไซต์นโยบายความเป็นส่วนตัวหรือข้อกำหนดและเงื่อนไขนโยบายและประกาศหรือวิธีการที่เราจัดการกับข้อมูลส่วนบุคคลของคุณโปรดติดต่อเรา.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>14. การสิ้นสุด</strong></p>
                                        <p>ข้อกำหนดและเงื่อนไขเหล่านี้มีผลบังคับใช้กับคุณเมื่อคุณเข้าสู่เว็บไซต์และ / หรือดำเนินการลงทะเบียนหรือช็อปปิ้งให้เสร็จสิ้น ข้อกำหนดและเงื่อนไขเหล่านี้หรือหนึ่งในนั้นอาจถูกแก้ไขหรือยกเลิกโดย Jaspal โดยไม่ต้องแจ้งให้ทราบล่วงหน้าไม่ว่าด้วยเหตุผลใด ๆ บทบัญญัติที่เกี่ยวข้องกับลิขสิทธิ์และเครื่องหมายการค้าการจำกัดความรับผิดการเรียกร้องข้อจำกัดความรับผิดการชดใช้ค่าเสียหายกฎหมายที่บังคับใช้การอนุญาโตตุลาการและทั่วไป.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>15. การยกเลิกและการส่งคืน</strong></p>
                                        <p>คำสั่งซื้อสามารถยกเลิกได้หากผลิตภัณฑ์ยังไม่ได้ส่งมอบ เมื่อผลิตภัณฑ์ถูกส่งไปยังบัญชีผู้ใช้พวกเขาจะไม่ได้รับอนุญาตให้ยกเลิกอีกต่อไป ผลตอบแทนใด ๆ หลังจากนั้นจะได้รับการจัดการเป็นกรณีไป ด้วยเหตุผลเราจะทำสิ่งที่เราสามารถทำได้เพื่อให้ลูกค้าพึงพอใจ หากไม่มีสิ่งผิดปกติในการซื้อเรามักจะไม่สามารถคืนเงินให้ได้.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>16. เครดิต</strong></p>
                                        <p>โปรแกรมการอ้างอิงเครดิตและรางวัลและผลประโยชน์นั้นจะขึ้นอยู่กับดุลยพินิจของ Jaspal Jaspal มีสิทธิ์ในการแก้ไขหรือยกเลิกบริการชั่วคราวหรือถาวรที่ให้บริการรวมถึงระดับคะแนนทั้งหมดหรือบางส่วนด้วยเหตุผลใดก็ตามขึ้นอยู่กับดุลยพินิจของสมาชิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้า Jaspal อาจเพิกถอน จำกัด หรือปรับเปลี่ยนเหนือสิ่งอื่นใด เพิ่มและลดเครดิตที่จำเป็นสำหรับข้อเสนอพิเศษใด ๆ ที่เกี่ยวข้องกับเครดิตผู้อ้างอิงและโปรแกรมรางวัล โดยการเป็นสมาชิกของ www.ccdoubleo.com คุณยอมรับว่าโปรแกรมการอ้างอิงเครดิตและรางวัลจะไม่รับผิดชอบต่อคุณหรือบุคคลที่สามใด ๆ สำหรับการแก้ไขหรือการหยุดโปรแกรมดังกล่าว.</p>
                                        <p>&nbsp;</p>
                                        <p><strong>17. ความเป็นส่วนตัว</strong></p>
                                        <p>สำหรับบริการจัดส่งเราตระหนักถึงหน้าที่ของเราในการเก็บข้อมูลของลูกค้าเป็นความลับ นอกเหนือจากหน้าที่ของเราในการรักษาความลับให้กับลูกค้าเราจะต้องปฏิบัติตามกฎหมายข้อมูลส่วนบุคคล (ความเป็นส่วนตัว) (กฎหมาย) อย่างเต็มที่ในการเก็บรักษาและใช้ข้อมูลส่วนบุคคลของลูกค้า โดยเฉพาะอย่างยิ่งเราปฏิบัติตามหลักการดังต่อไปนี้บันทึกเป็นอย่างอื่นตกลงโดยลูกค้าอย่างเหมาะสม:</p>
                                        <p>17.1 การรวบรวมข้อมูลส่วนบุคคลจากลูกค้าจะใช้เพื่อจุดประสงค์ที่เกี่ยวข้องกับการให้บริการโลจิสติกส์หรือบริการที่เกี่ยวข้อง;</p>
                                        <p>17.2 ทุกขั้นตอนการปฏิบัติจะถูกนำไปใช้เพื่อให้แน่ใจว่าข้อมูลส่วนบุคคลนั้นถูกต้องและจะไม่ถูกเก็บไว้นานเกินความจำเป็นหรือจะถูกทำลายตามระยะเวลาการเก็บรักษาภายในของเรา;</p>
                                        <p>17.3 ข้อมูลส่วนบุคคลจะไม่ถูกนำไปใช้เพื่อจุดประสงค์อื่นใดนอกเหนือจากข้อมูลที่จะถูกนำไปใช้ในเวลาที่รวบรวมหรือวัตถุประสงค์ที่เกี่ยวข้องโดยตรง</p>
                                        <p>17.4 ข้อมูลส่วนบุคคลจะได้รับการปกป้องจากการเข้าถึงการประมวลผลหรือลบโดยไม่ได้รับอนุญาต;</p>
                                        <p>17.5 ลูกค้าจะมีสิทธิ์ในการแก้ไขข้อมูลส่วนบุคคลของพวกเขาที่เราเก็บไว้และการร้องขอของลูกค้าสำหรับการเข้าถึงหรือการแก้ไขจะได้รับการจัดการตามกฎหมาย.</p>";
        $informationLocale->meta_title = 'ข้อกำหนด และ นโยบาย';
        $informationLocale->meta_keyword = 'ข้อกำหนด,นโยบาย';
        $informationLocale->meta_description = 'เหล่านี้เป็นข้อกำหนดและเงื่อนไขของข้อตกลงของเราซึ่งใช้กับการซื้อผลิตภัณฑ์ทั้งหมดของคุณจาก www.ccdoubleo.com ดำเนินการโดย Jaspal Group รวมถึง บริษัท ในเครือและ บริษัท ในเครือที่ให้บริการแก่คุณ (ในที่นี้เรียกว่า "เว็บไซต์") ภายใต้ เงื่อนไขต่อไปนี้ โปรดอ่านข้อกำหนดต่อไปนี้อย่างละเอียด หากคุณไม่ยอมรับข้อกำหนดและเงื่อนไขดังต่อไปนี้คุณไม่สามารถเข้าหรือใช้เว็บไซต์นี้ หากคุณยังคงเรียกดูและใช้เว็บไซต์นี้คุณตกลงที่จะปฏิบัติตามและผูกพันตามข้อกำหนดและเงื่อนไขการใช้งานต่อไปนี้ซึ่งรวมถึงนโยบายความเป็นส่วนตัวของเราจะบังคับ Jaspal และการใช้งานเว็บไซต์ของคุณที่เกี่ยวข้องกับเว็บไซต์นี้.';
        $informationLocale->information_id = 1;
        $informationLocale->save();

        $information = new Information();
        $information->sort_order = 1;
        $information->status = 'Enabled';
        $information->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'en';
        $informationLocale->title = 'Delivery and Returns';
        $informationLocale->slug = 'delivery-and-returns';
        $informationLocale->description = "<h2><strong>PAYMENT METHODS</strong></h2>
                                            <ul>
                                            <li>You can pay via Debit cards, Master cards, Visa cards, or American Express cards. (If your card is rejected please contact your bank for clarification)&nbsp;</li>
                                            <li>Cash on Delivery (COD) can be done by making payment directly with a delivery staff.&nbsp;</li>
                                            </ul>
                                            <p>&nbsp;</p>
                                            <h2><strong>PRODUCT DELIVERY</strong></h2>
                                            <ul>
                                            <li>Product delivery within Bangkok and vicinity will take 2-3 business days and 3-5 business days for other provinces (during sale and promotion period delivery might take longer than expected). Please note that it may take longer in some areas, but our team will try our best to deliver the products as soon as possible.&nbsp;</li>
                                            <li>International Shipping is available.</li>
                                            <li>Delivery fee is 80 Baht for Standard Delivery in Thailand and free for purchases more than 1,500 Baht.</li>
                                            <li>International Delivery Fee is 800 Baht</li>
                                            <li>You can track your order by clicking on the link provided in your purchase confirmation email.&nbsp;</li>
                                            </ul>
                                            <p>&nbsp;</p>
                                            <h2><strong>RETURN POLICY</strong></h2>
                                            <ul>
                                            <li>Return products must be in good condition with price tag on and with the receipt. It should not be worn, washed, or altered.&nbsp;</li>
                                            <li>Products can be returned no longer than 14 days after the delivering date.&nbsp;</li>
                                            <li>Customers must receive the products before requesting for refunds.&nbsp;</li>
                                            <li>Products with discount and/or promotion cannot be exchanged or returned.&nbsp;</li>
                                            <li>Please submit the Return Request Form on the website, our customer service representative will contact you to verify the return address,&nbsp;our courier will then contact you to arrange the pick-up of the item(s).</li>
                                            <li>Once we received and confirmed the returned products, our customer service representative will contact you back to verify and proceed in giving you your money back within 10 days.&nbsp;</li>
                                            <li>For purchases done via credit cards, the money will be wired back into your account which may take up to 30 business days depending on your bank.&nbsp;</li>
                                            <li>For purchases done via COD, you will receive store credits instead of cash for your next purchases.&nbsp;</li>
                                            <li>If the amount is incorrect, please contact our customer service department so we can assist you as soon as possible.&nbsp;</li>
                                            </ul>
                                            <p>* www.ccdoubleo.com reserves the rights to decline any return requests that exceed the set timeframe or if the products are not in the same condition as the day it was delivered.&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <h2><strong>EXCHANGE</strong></h2>
                                            <p>You cannot exchange products, but you may return the products and make new purchases. Please kindly see our return policy for more details.&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <h2><strong>DEFECTIVE PRODUCT</strong></h2>
                                            <p>For defective or damaged products please contact our customer service department at 02-367-2055 , 02-367-2056 We will give you store credits for mailing expenses. Please attach the mailing receipt for us. (Only apply for cases that products are confirmed to be defected or damaged)&nbsp;</p>
                                            <p>*This does not apply to products that are damaged after usage.&nbsp;</p>";
        $informationLocale->meta_title = 'Delivery and Returns';
        $informationLocale->meta_keyword = 'delivery,returns';
        $informationLocale->meta_description = 'You can pay via Debit cards, Master cards, Visa cards, or American Express cards. (If your card is rejected please contact your bank for clarification)';
        $informationLocale->information_id = 2;
        $informationLocale->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'th';
        $informationLocale->title = 'การจัดส่ง และ การคืนเงิน';
        $informationLocale->slug = 'การจัดส่ง-และ-การคืนเงิน';
        $informationLocale->description = "<h2><strong>การชำระเงิน</strong></h2>
                                            <ul>
                                            <li>รับชำระเงินผ่านบัตรเครดิต&nbsp;หรือบัตรเดบิต&nbsp;Visa, Master card, American Express (กรณีบัตรถูกปฏิเสธ&nbsp;กรุณาติดต่อธนาคารผู้ให้บริการบัตรเครดิตของท่าน)</li>
                                            <li>การชำระเงินปลายทาง&nbsp;(COD)&nbsp;&nbsp;สามารถชำระค่าสินค้าโดยตรงให้กับพนักงานจัดส่งเมื่อได้รับสินค้า</li>
                                            </ul>
                                            <p>&nbsp;</p>
                                            <h2><strong>การจัดส่งสินค้า</strong></h2>
                                            <ul>
                                            <li>จัดส่งสินค้าทั้งในประเทศและต่างประเทศ</li>
                                            <li>ระยะเวลาการจัดส่งสินค้าถึงมือคุณ 2 - 3 วันทำการในเขตกรุงเทพและปริมณฑล และ 3 - 5 วันทำการในต่างจังหวัด (สำหรับช่วงเวลาการจัดโปรโมชั่นอาจใช้ระยะเวลาการจัดส่งที่มากขึ้น) โดยในบางพื้นที่อาจใช้ระยะเวลาการจัดส่งที่เกินกว่าเวลาที่กำหนด&nbsp;&nbsp;อย่างไรก็ตามทีมงานของเราจะพยายามจัดส่งสินค้าถึงมือคุณอย่างเร็วที่สุด&nbsp;</li>
                                            <li>ค่าบริการจัดส่งแบบปกติในประเทศ&nbsp;80 บาท&nbsp;และจัดส่งฟรี! เมื่อสั่งสินค้าตั้งแต่ 1,500 บาทขึ้นไป</li>
                                            <li>ค่าบริการจัดส่งแบบปกติไปต่างประเทศ 800 บาท</li>
                                            <li>ติดตามสถานะการจัดส่งได้ที่&nbsp;Link&nbsp;จากอีเมล&nbsp;ยืนยันการสั่งสินค้า</li>
                                            </ul>
                                            <p>&nbsp;</p>
                                            <h2><strong>นโยบายการส่งคืนสินค้า</strong></h2>
                                            <ul>
                                            <li>สินค้าต้องอยู่ในสภาพที่สมบูรณ์ โดยยังมีป้ายสินค้าติดอยู่และรายการต้องตรงกับใบจัดส่งสินค้า&nbsp;โดยสินค้าไม่เคยสวมใส่ ซักหรือดัดแปลงใดๆ</li>
                                            <li>สามารถคืนสินค้าได้ภายใน 14 วัน นับจากวันที่จัดส่งสินค้า</li>
                                            <li>ลูกค้าจำเป็นต้องได้รับสินค้าก่อนที่จะทำรายการคืนสินค้าและขอคืนเงิน</li>
                                            <li>สินค้าในหมวดลดราคาและสินค้าที่จัดรายการส่งเสริมการขายไม่สามารถเปลี่ยนหรือคืนได้</li>
                                            <li>โปรดกรอกแบบฟอร์มขอคืนสินค้าบนเวบไซต์ และ ผู้ให้บริการจัดส่งของเราจะติดต่อเพื่อเข้ารับสินค้าคืน</li>
                                            <li>เมื่อทางเราได้รับสินค้าและอนุมัติรายการแล้ว ฝ่ายบริการลูกค้าจะทำการติดต่อคุณเพื่อยืนยันรายการที่อนุมัติ และดำเนินการขอคืนเงินค่าสินค้าภายใน 10 วัน&nbsp;</li>
                                            <li>สำหรับการทำรายการผ่านบัตรเครดิต จะได้รับการโอนเงินคืนกลับไปยังวิธีการชำระเงินเดิม อาจใช้เวลาถึง 30 วันทำการ ในการปรากฏเงินในบัญชีของคุณขึ้นอยู่กับรอบบิลของแต่ละธนาคาร&nbsp;</li>
                                            <li>สำหรับการซื้อสินค้าที่ชำระเงินปลายทาง (COD) จะได้รับการคืนเป็นรหัสเครดิตแทนเงินสดเพื่อใช้ทำรายการซื้อสินค้าในครั้งถัดไป&nbsp;</li>
                                            <li>หากยอดเงินคืนไม่ถูกต้อง กรุณาติดต่อฝ่ายบริการลูกค้าของเรา โดยเราจะพยายามแก้ปัญหาให้โดยเร็วที่สุด</li>
                                            </ul>
                                            <p>* www.ccdoubleo.com ขอสงวนสิทธิ์ในการปฏิเสธการรับคืนสินค้าที่เกินกว่าระยะเวลาที่กำหนด หรือสินค้าที่ไม่ได้อยู่ในสภาพเดียวกับที่ได้จัดส่ง</p>
                                            <p>&nbsp;</p>
                                            <h2><strong>การเปลี่ยนสินค้า</strong></h2>
                                            <p>ไม่สามารถเปลี่ยนสินค้าได้ แต่คุณสามารถทำตามขั้นตอนการคืนสินค้าของเราและซื้อสินค้าที่คุณต้องการใหม่ โปรดดูนโยบายการคืนสินค้าของเรา</p>
                                            <p>&nbsp;</p>
                                            <h2><strong>กรณีสินค้ามีตำหนิ</strong></h2>
                                            <p>หากคุณพบว่าสินค้ามีตำหนิ หรือชำรุด กรุณาติดต่อฝ่ายบริการลูกค้าของเราที่เบอร์ 02-367-2055 , 02-367-2056 โดยค่าจัดส่งสินค้าถึงเราจะถูกคืนเป็นรหัสเครดิตแทนเงิน เพื่อใช้ทำรายการซื้อสินค้าในครั้งถัดไป โดยแนบหลักฐานค่าใช้จ่ายในการส่งคืนกลับมาหาเรา (ในกรณีสินค้าได้รับการตรวจสอบแล้วว่าเป็นสินค้ามีตำหนิ หรือชำรุดจริง)&nbsp;*สินค้าที่เสียหายอันเป็นผลจากการสวมใส่หรือการใช้งาน ไม่ถือว่าเป็นสินค้ามีตำหนิ&nbsp;</p>";
        $informationLocale->meta_title = 'การจัดส่ง และ การคืนเงิน';
        $informationLocale->meta_keyword = 'การจัดส่ง,การคืนเงิน';
        $informationLocale->meta_description = 'รับชำระเงินผ่านบัตรเครดิต หรือบัตรเดบิต Visa, Master card, American Express (กรณีบัตรถูกปฏิเสธ กรุณาติดต่อธนาคารผู้ให้บริการบัตรเครดิตของท่าน)';
        $informationLocale->information_id = 2;
        $informationLocale->save();

        $information = new Information();
        $information->sort_order = 2;
        $information->status = 'Enabled';
        $information->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'en';
        $informationLocale->title = 'About Us';
        $informationLocale->slug = 'about-us';
        $informationLocale->description = "<p>Vuexy began its business in the United States in the 80s, by two Marciano brothers' who lived in Marseilles in the south of France who had a strong passion for the Western way of life in the United States and Pompey. Moving to California in 1977, they began a fashion business focusing on Street Fashion with classic
                                            American fashion concept through European perspectives that made them famous in the United States. Vuexy quickly became a symbol of a young, sexy and adventurous lifestyle. Throughout the decades Vuexy invited people to dream with its iconic and timeless advertising campaigns that turned unknown faces into famous models. In 2004, the company expanded with a new retail concept for its contemporary collection called Marciano. The Marciano brand offers a fashion-forward collection designed for trend-setting women and men. In 2007, the G by Vuexy retail concept was born, gaining its Southern California aesthetic from the Marciano brothers' personal passion for the young in California. These days, Vuexy is a truly world-class lifestyle brand with a wide range of clothing and accessories available in more than 80 countries around the world.</p>";
        $informationLocale->meta_title = 'About Us';
        $informationLocale->meta_keyword = 'about us';
        $informationLocale->meta_description = 'Vuexy began its business in the United States in the 80s, by two Marciano brothers who lived in Marseilles in the south of France who had a strong passion for the Western way of life in the United States and Pompey. Moving to California in 1977';
        $informationLocale->information_id = 3;
        $informationLocale->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'th';
        $informationLocale->title = 'เกี่ยวกับเรา';
        $informationLocale->slug = 'เกี่ยวกับเรา';
        $informationLocale->description = "<p>Vuexy เริ่มต้นธุรกิจในสหรัฐอเมริกาในช่วงทศวรรษที่ 80 โดยพี่น้อง Marciano สองคนที่อาศัยอยู่ใน Marseilles ทางตอนใต้ของฝรั่งเศสซึ่งหลงใหลในวิถีชีวิตแบบตะวันตกในสหรัฐอเมริกาและ Pompey ย้ายไปแคลิฟอร์เนียในปี 2520 พวกเขาเริ่มธุรกิจแฟชั่นโดยเน้นที่ สตรีทแฟชั่น ด้วยแนวคิดแฟชั่นอเมริกันคลาสสิกผ่านมุมมองของยุโรปที่ทำให้พวกเขาโด่งดังในสหรัฐอเมริกา Vuexy กลายเป็นสัญลักษณ์ของชีวิตวัยรุ่น เซ็กซี่
                                            และการผจญภัยอย่างรวดเร็ว ตลอดหลายทศวรรษที่ผ่านมา Vuexy      เชิญผู้คนมาฝันด้วยแคมเปญโฆษณาอันโดดเด่นและเหนือกาลเวลาที่เปลี่ยนใบหน้าที่ไม่รู้จักให้กลายเป็นนางแบบที่มีชื่อเสียง ในปี 2547 บริษัทได้ขยายแนวคิดการค้าปลีกแบบใหม่สำหรับคอลเลคชันร่วมสมัยที่เรียกว่า Marciano แบรนด์ Marciano นำเสนอคอลเลกชันแฟชั่นล้ำยุคที่ออกแบบมาสำหรับผู้หญิงและผู้ชายที่นำเทรนด์ ในปี 2550 แนวคิดการค้าปลีก G by Vuexy ถือกำเนิดขึ้นโดยได้รับสุนทรียภาพทางตอนใต้ของแคลิฟอร์เนียจากความหลงใหลส่วนตัวของพี่น้อง Marciano ที่มีต่อคนหนุ่มสาวในแคลิฟอร์เนีย ปัจจุบัน Vuexy เป็นแบรนด์ไลฟ์สไตล์ระดับโลกอย่างแท้จริง โดยมีเสื้อผ้าและเครื่องประดับมากมายในกว่า 80 ประเทศทั่วโลก</p>";
        $informationLocale->meta_title = 'เกี่ยวกับเรา';
        $informationLocale->meta_keyword = 'เกี่ยวกับเรา';
        $informationLocale->meta_description = 'Vuexy เริ่มต้นธุรกิจในสหรัฐอเมริกาในช่วงทศวรรษที่ 80 โดยพี่น้อง Marciano สองคนที่อาศัยอยู่ใน Marseilles ทางตอนใต้ของฝรั่งเศสซึ่งหลงใหลในวิถีชีวิตแบบตะวันตกในสหรัฐอเมริกาและ Pompey ย้ายไปแคลิฟอร์เนียในปี 2520';
        $informationLocale->information_id = 3;
        $informationLocale->save();
    }
}
