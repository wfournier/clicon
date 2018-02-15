<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/Style/InformationStyle.css">
    <title>GameCon_Information</title>
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>

<main>
    <div style="text-align: center">
        <h1>General Information</h1>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4" id="hours">
            <h3>Opening Hours</h3>
            <br>
            <table align="center">
                <tr>
                    <th></th>
                    <th> Friday</th>
                    <th> Saturday</th>
                    <th> Sunday</th>
                </tr>
                <tr>
                    <th>Registration</th>
                    <td> 8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Convention Hours</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Retro Corner</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Arcade Games</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>LAN Party</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Studios' Hall</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
            </table>
            <br>
            <p style="color: red">**Thursday: Registration open from 8 am to 10 pm</p>
        </div>
        <div class="col-lg-4" id="location">
            <h3>Location</h3>
            <br>
            <p>Clicon will be hosted at:<br>
                <a href="http://placebonaventure.com" target="_blank">Place Bonaventure</a>
            </p>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Place_Bonaventure_04.JPG/1024px-Place_Bonaventure_04.JPG"
                 alt="PlaceBonaventure_Wikipedia" width="300px" height="auto" style="border: solid black 1px">
            <p>800 De La Gauchetière,<br>Montreal, QC H5A 1K6<br>(415)397-2233<br>Open 24h</p>
        </div>
    </div>
    <!--RULES-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse1" id="rules">Convention Rules <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse1" class="col-md-6 collapse">
            <p>
            <h3>General</h3>
            If you aren't allowed to do it outside of Clicon, it isn't allowed at Clicon.

            Clicon strives to create an environment which caters to the anime/cosplay/gaming community culture,
            but would like to remind attendees that they are still expected to be law abiding and responsible.
            Attendees who violate these rules may be subject to expulsion from Clicon without refund, and may be
            banned from attending all Clicon events in subsequent years.

            <h3>Behaviour</h3>
            All attendees must conduct themselves with proper decorum.

            Attendees must behave respectfully towards individuals from other groups attending events being held at
            the Palais des congrès as well as Clicon staff and venue representatives. Attendees acting
            disrespectfully or disruptively on the site of the convention or any other area of the Palais des
            congrès may be expelled from the Clicon event by venue security. <b>Physical violence against staff or
                venue personnel will not be tolerated and will result in immediate expulsion and permanent ban from the
                event.</b>

            Any activities deemed to be nuisances to Clicon or the venue, including but not limited to excessive
            noise or behaviour considered generally disruptive, dangerous, or damaging, will result in expulsion
            from the venue and the event by security and may result in further civil and criminal liability.

            Laser pointers, laser-aiming devices, or similar devices, may not be used in public, unless you are
            officially sanctioned to lead or present an Clicon seminar, workshop, display, or other
            Clicon-sanctioned event in which a laser is needed.

            In the interest of respecting the rights of people who want to be left alone, the following behaviours
            are considered unacceptable without prior consent of the recipient: hugging, glomping, back-slapping,
            kissing or other unwanted physical contact. This also includes unwanted advances or other similar forms
            of behaviour considered to be harassment.

            <h3>Badges</h3>
            <b>Badges must be worn, visible and accessible at all times.</b> Badges should be positioned forward-facing
            around chest height. If the badge cannot be displayed at chest height due to costume restrictions or
            other issues, please make sure to display it as prominently and visibly as possible. <b>Cosplayers may
                temporarily conceal them for the purpose of photos, but must keep their badge visible for the remainder
                of the time.</b>

            Attendees who do not have their badges properly displayed may be refused access to Clicon activities
            and/or be escorted off site.

            All participants must carry a picture ID at all times and must produce it when requested by Clicon
            staff or venue security.

            Participants who have lost their badge must report the loss as soon as possible to the registration
            desk. Lost badges should be returned to the registration desk. If your lost badge is recovered, you may
            pick it up at the registration desk upon presentation of photo ID.

            <h3>Sales</h3>
            The sale or solicitation of any type of goods or services on Clicon premises without prior permission
            and arrangements with Clicon staff is strictly prohibited. This rule will be strictly enforced.
            Violation will result in expulsion from Clicon and possibly the venue by Clicon staff and/or venue
            security. This rule applies universally to all guests, dealers, and attendees.

            The following areas are designated as sales areas for the following people:
            <ul>
                <li>Attendees may place items up for sale at the Garage Sale table in the Exhibition Hall only (see
                    Garage
                    Sale rules for more details and limitations),
                </li>
                <li>Dealers with Dealer spaces are permitted to sell in the Dealers' Area only,</li>
                <li>Artists with Artist tables are permitted to sell in the Artists' Area only,</li>
                <li>Exhibitors with Exhibitor tables are permitted to sell in the Exhibition Hall in the designated
                    area,
                </li>
                <li>Guests with a Guest table are permitted to sell at their guest table in the Exhibition Hall or at
                    designated events where they are hosts,
                </li>
                <li>Clicon-approved events with permission to sell goods may sell them in their designated event room
                    only.
                </li>
            </ul>
            No food or drinks may be sold on Clicon premises without prior authorization. <b>Capital Traiteur is the
                exclusive caterer and food provider for the Palais des congrès.</b>

            No sharp or metal weapons may be sold on the premises without the express permission of the organizers.
            All weapons must be lawful and conform to Clicon's weapons policy.

            Sharp or metal weapons may only be sold if they are immediately sealed in the appropriate carrying
            container. Any weapons intended to be used as props must be peace bonded immediately by Clicon's
            weapons master. Clicon, its organizers and the venue reserve the right to restrict any participant
            from selling weapons.

            Unlicensed reproductions of copyrighted works (ie: "bootlegs", "fansubs", "Hong Kong versions", etc.)
            may not be offered for sale. This includes video tapes, CDs, DVDs, Blu-rays, computer software,
            collectibles, apparel or printed artwork not produced under license by the original copyright holder, or
            any other unlawful reproduction of works. If it is not visibly authentic, don't bring it.

            The sale and display of explicit material to minors is strictly forbidden. Sellers may have a sign
            indicating adult materials are available, but they must be kept out of sight and restricted from minors.

            Additional lighting and sound equipment is permitted in the Exhibition Hall on the condition that it
            does not interfere with other participants. Any devices that produce noise or other disruption,
            including megaphones, sirens, strobe lights and horns are prohibited. Yelling, hawking or other
            aggressive solicitation of customers is also prohibited.

            Sellers are responsible for collection of taxes and acquisition of any applicable permits and licenses.

            Only original, personal fan works created by the selling artist may be sold in the Artists' Area. The
            sale of commercial goods such as video tapes, CDs, DVDs, Blu-rays, posters, scrolls, pens, etc., is
            prohibited unless you or the group you represent are the copyright owner or licensors of said works. The
            advertising of any such restricted goods or services is also forbidden. Violation will lead to expulsion
            from the Artists' Area.

            <b>All exhibitors must obey the policies as outlined in their respective Clicon exhibitor kit.</b>

            <h3>Venue</h3>
            The Palais des congrès is partially rented for use by Clicon. Although parts of the venue have been
            reserved for Clicon use, it is a public space and is subject to general public safety laws and
            regulations.

            <ul>
                <li>All exits, stairways, escalators and corridors must be kept open and free to circulation at all
                    times; Otakuthon or venue staff will request that anyone blocking free circulation move or otherwise
                    disperse.
                </li>
                <li>Stairways, escalators and elevators should also be used only for their intended purpose, and any
                    horseplay or other unsafe activity is not permitted.
                </li>
                <li>No live animals (except those with a specific legal status such as guide dogs) are allowed on
                    site.
                </li>
                <li>It is forbidden to touch Otakuthon equipment, including AV equipment, consoles, computers, etc,
                    unless asked to by Otakuthon staff.
                </li>
                <li>It is forbidden to touch, stick things to, write on or otherwise tamper with Otakuthon signage.</li>
                <li>Displaying posters or otherwise affixing objects on venue bulletin boards, walls or doors is
                    strictly forbidden and may result in expulsion from Otakuthon premises by venue security.
                </li>
                <li>If you have special signage or other requirements, please speak to the Otakuthon Information Desk.
                </li>
                <li><strong><strong>The use of any type of roller blades, roller skates, skateboards, hoverboards or any
                            other similar accessory in the venue is forbidden.</strong></strong></li>
                <strong>
                    <li><strong>Drones are not permitted to be used on the premises</strong><strong>.</strong></li>
                </strong>
            </ul>
            <h3>Costuming, Props and Dress Code</h3>
            Cosplay is highly encouraged, but some restrictions apply:

            <ul>
                <li>Footwear is required (do not come barefoot).</li>
                <li>Costumes that are deemed to be indecently revealing (the "no costume is not a costume" principle),
                    as well as costumes or props that are deemed to be offensive or otherwise unacceptable by Otakuthon
                    community standards are prohibited. An attendee who is wearing a costume or carrying a prop that
                    does not meet these requirements may be asked to change into either street clothes or another
                    costume.
                </li>
                <li>All large props or any props resembling weapons (including guns, swords, spears, whips, bows, etc.)
                    must pass through weapons check and be verified and peace bonded by the Otakuthon Weapons Master to
                    ensure they are safe. Failure to do so may result in expulsion from Otakuthon without refund. (See
                    section below - Weapons and Large Props Policy.)
                </li>
            </ul>

            <h3>Photography and Video</h3>
            Tip: Always ask for permission before photographing or video recording anyone.

            <ul>
                <li>Take special care not to obstruct the flow of traffic.</li>
                <li>Photography and recordings may be permitted during workshops, panels, guest sessions and in the
                    Artists' Area at the discretion of the host(s)/artists involved. If you are unsure whether
                    photography or videography are allowed during a particular event or in a particular area, ASK
                    PERMISSION FROM STAFF FIRST.
                </li>
                <li><strong>Flash photography will not be allowed during the masquerade and the World Cosplay Summit for
                        safety reasons.</strong></li>
                <li>The use of cameras in the screening rooms and the Art Gallery is prohibited,</li>
                <li>Photography of merchandise in the Dealers' Area is prohibited.</li>
                <li>Otakuthon reserves the right to prohibit photography and/or videotaping of any event or area.</li>
                <li>Convention staff may review and/or demand deletion of any unauthorized photographs or video
                    recordings.
                </li>
            </ul>

            <h3>Alcohol, Drugs and Smoking</h3>
            Clicon is an alcohol, drug and smoking-free event, and the venue is a smoke-free establishment. While
            we do not restrict what people do outside Clicon area, any person found intoxicated on the premises
            will be asked to leave.

            <b>NOTE: The use of electronic cigarettes ("vaping") is restricted in the same way as regular cigarettes
                and may not be used on site.</b>

            <h3>Food and Drinks</h3>
            Bringing your own food and beverages is permitted, but the consumption of food or beverages is forbidden
            in all function rooms (e.g. video rooms, panels, contest rooms, etc.), all gaming areas as well as
            events rooms. Only water bottles will be accepted in these rooms. It is strongly suggested that the
            Cosplay Cafe (on the 7th floor) and the Chibi Cafe (in the Exhibition Hall) are to be used for your
            eating and drinking needs.

            Attendees are also expected to take proper measures to maintain a clean environment and dispose of any
            food or drink (including packaging) related garbage properly when they are done. Attendees who cause
            damage or are otherwise abusive of their food and drink privileges may be expelled from the convention.

            <h3>Bags</h3>
            A bag check will be available to attendees. <b>To improve service and efficiency, the Bag Check is operated
                by the Palais des congrès. The Bag Check is located on the 2nd floor by the Viger Hall entrance of the
                Palais, near the Palais des congrès Information Desk. While the bag check will be monitored, Clicon
                and the Palais des congres will not be held responsible for any lost, stolen or damaged items.</b>

            <h3>Weapons and Large Props Policy</h3>
            All large props and all props resembling weapons must be approved by the Clicon Weapons Master prior
            to being admitted to event areas. The Weapons Master will label and/or peace bond the weapons, if
            necessary.

            Please see the official <a href="/Information.php#weapon">Weapons And Large Props Policy</a> on the
            Clicon website for more details.

            You are responsible for your conduct and handling of props. Clicon and the venue will not be held
            responsible for any damages resulting from an attendee's props or improper usage or handling of same,
            and attendees will indemnify, hold and save harmless Clicon and the venue for any such damages.

            <h3>Privacy</h3>
            By attending Clicon, you grant permission to Clicon to publish, electronically or in print, your
            name and photograph, as well as the name and logo of your company, group or other organization (e.g.
            cosplay circle, team, club, etc.) for the purpose of promotion, documentation and/or record-keeping.

            <h3>Liability</h3>
            The liability to any attendee by Clicon for any damage or loss suffered at or caused by Clicon,
            its staff or assigns, shall not exceed the registration fees paid by that attendee.

            Each attendee agrees to indemnify, hold and save harmless Clicon and its staff or assigns against any
            damages or losses suffered by third persons for which the attendee is responsible to any extent.</p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--REGISTRATION-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse2" id="registration">Registration Policies
            <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse2" class="col-md-6 collapse">
            <h2>Otakuthon 2017 Registration Policies</h2>
            <p>Please take a moment to read the convention rules and policies on our website or in the program booklet.
                By registering, you agree to comply with Otakuthon's rules and policies. Failure to follow the rules may
                result in loss of badge and expulsion from the convention grounds without refund.</p>
            <h3>1. Refund Policy</h3>
            <p><strong>Registrations are non-refundable -- this includes badges as well as any paid extras (ex: concert
                    tickets, T-shirts, etc.).</strong>&nbsp;Badges may not be resold.</p>
            <h3>2. Price and Payment</h3>
            <p>Registrations must be paid in full before the respective registration deadlines to benefit from the
                reduced rate, if applicable. Any registration not paid before the end of the respective registration
                period will lose the reduced rate or be cancelled.</p>
            <p>Mail-in payments must be postmarked on or before the respective deadline and must be received no later
                than one week after the deadline. Otakuthon will not be responsible for any payments that may be lost
                through mail. Please do&nbsp;<strong>not</strong>&nbsp;send cash through the mail -- we accept cheques
                and money orders via mail.</p>
            <p>Single-day badges can only be purchased on the same day on the convention site (ex: a Saturday-only badge
                can only be purchased on that Saturday).</p>
            <h3>3. Badge Pickup</h3>
            <p>Badges must be picked up during <a href="/Information.php#hours">Otakuthon 2017 registration
                    hours</a> at
                the Palais des congrès in the registration area. Badges will&nbsp;<strong>not</strong>&nbsp;be mailed or
                issued otherwise.</p>
            <p>To pick up your badge, you will need a copy of your <strong>registration confirmation</strong> (printed
                or digital copy) with a <strong>valid photo ID</strong> (ex: student card, Opus card, driver's license,
                Medicare, etc). Please be sure that the information provided in the registration system is correct (ex:
                first name, last name, birth date, etc.), as this information will be matched against the valid photo ID
                you provide when you pick up your badge.&nbsp; Staff reserve the right to withhold badges from
                individuals whose information provided does not match with the valid photo ID provided.</p>
            <p>Each attendee must come in person and present a valid photo ID in order to pick up his/her own badge. The
                account owner has no pickup rights to the attendee badges listed under him/her. However, the account
                owner can update badge information until <strong>July 28, 2017</strong>.</p>
            <p><strong>Information on your valid photo ID must match the information you have entered.</strong></p>
            <p><span style="font-weight: bold;">The account owner can pick up his/her own badge ONLY. &nbsp;</span>Only
                the participant whose name matches may pick up the corresponding badge. &nbsp;</p>
            <h3>4. Child Registration</h3>
            <p>Children under the age of 11 and under born after&nbsp;<strong>July 31, 2005&nbsp;</strong>must always be
                registered under a legal guardian. Otakuthon staff and volunteers are not responsible for taking care of
                children. The guardian is responsible for keeping their child under supervision.</p>
            <p>All children of age 11 and under&nbsp;<strong>must present a valid ID</strong>&nbsp;(ex: birth
                certificate, health insurance card, passport, etc.) as proof of age.</p>
            <h3>5. Lost and Found Badges</h3>
            <p>Found badges may be claimed upon presentation of a valid photo ID at registration. Lost badges will be
                replaced at a fee equal to the at-door registration rate.</p>
            <h3>6. Badge Policy</h3>
            <p><strong>Badges must be worn, visible and accessible at all times.</strong>&nbsp;Badges should be
                positioned forward-facing around chest height. If the badge cannot be displayed at chest height due to
                costume restrictions or other issues, please make sure to display it as prominently and visibly as
                possible. Cosplayers may temporarily conceal them for the purpose of photos, but must keep their badge
                visible for the remainder of the time.</p>
            <p>Attendees who do not have their badges properly displayed may be refused access to Otakuthon activities
                and/or be escorted off site.</p>
            <p><strong>All participants must carry a valid photo ID at all times and must produce it when requested by
                    Otakuthon staff or venue security</strong>.</p>
            <p>Participants who have lost their badge must report the loss as soon as possible to the registration desk.&nbsp;
                Lost badges should be returned to the registration desk. If your lost badge is recovered, you may pick
                it up at the registration desk upon presentation of a valid photo ID.</p>
            <h3>7. Information Accuracy</h3>
            <p>Attendees must provide complete and accurate registration information. Registration information must
                correspond with information on the valid photo ID used to pick up their badge. Staff reserve the right
                to withhold badges from individuals whose information provided does not match with the valid photo ID
                provided. Otakuthon will not be held responsible in the event that an attendee cannot be contacted with
                the provided information.</p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--WEAPON-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse3" id="weapon">Weapon Policy <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse3" class="col-md-6 collapse">
            <p><strong>If it's illegal outside the convention, it's illegal inside the convention.</strong></p>
            <p>For the safety of all con attendees, the following policy towards such items will be&nbsp;strictly&nbsp;enforced.
                Costumers are expected to read and comply to it completely.&nbsp;<strong>Failure to do so will result in
                    warnings and potentially loss of convention membership.</strong></p>
            <p>Please note that certain exemptions to rules 4, 5, or 8 may be considered for the purpose of the Costume
                Masquerade ONLY. If you wish to submit a weapon or routine for special consideration, please consult
                with the Masquerade Director prior to the masquerade registration deadline.&nbsp;</p>
            <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>NO live firearms</strong>. Removal of firing pin or bolt does not
                negate this rule! Airsoft guns are also considered live firearms and are not acaceptable.</p>
            <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>NO prohibited weapons</strong>&nbsp;(as defined by applicable
                Canadian Laws).&nbsp;Examples include (but are not limited to):</p>
            <ul>
                <li><span style="text-decoration: underline;">Balisong</span>&nbsp;("butterfly knife") or&nbsp;<span
                            style="text-decoration: underline;">switchblade/dropblade style knives</span>.
                </li>
                <li><span style="text-decoration: underline;">Nunchucks</span>,&nbsp;<span
                            style="text-decoration: underline;">tonfas</span>,&nbsp;<span
                            style="text-decoration: underline;">shurikens</span>, or similarly&nbsp;<span
                            style="text-decoration: underline;">restricted&nbsp;martial&nbsp;arts&nbsp;weapons</span>&nbsp;which
                    are illegal under the law (foam models of these items are permitted).
                </li>
                <li><span style="text-decoration: underline;">Law&nbsp;enforcement items</span>&nbsp;such as&nbsp;<span
                            style="text-decoration: underline;">batons</span>,&nbsp;<span
                            style="text-decoration: underline;">tazers</span>&nbsp;or&nbsp;<span
                            style="text-decoration: underline;">mace</span>.&nbsp;
                </li>
            </ul>
            <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>NO&nbsp;replicas of&nbsp;contemporary&nbsp;firearms</strong>&nbsp;(i.e.
                beginning from the era of revolvers - U.S. Civil War forward to any currently manufactured firearms).
            </p>
            <p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>All&nbsp;weapons&nbsp;must be holstered, sheathed or slung in an
                    approved fashion.</strong></p>
            <p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Weapons&nbsp;will not be drawn or displayed outside of convention
                    function space</strong>&nbsp;(except in the privacy of a hotel room),&nbsp;<strong>or in any public
                    or crowded area except for specific photo ops areas.</strong></p>
            <p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Due and full consideration must be given to physical safety and
                    peace of mind of other persons at all times.</strong>&nbsp;This includes the general public and
                venue staff, not just other convention attendees.</p>
            <p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>All&nbsp;weapons&nbsp;or large props must be checked and
                    authorized by the&nbsp;Weapons&nbsp;Masters at the&nbsp;Weapons&nbsp;Registration tables&nbsp;on
                    arrival</strong>. Upon approval, the weapon(s) and your convention badge will be marked accordingly.
                It is strictly forbidden to tamper with the mark on either your badge or your weapon.</p>
            <p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Any&nbsp;weapons&nbsp;which fail to meet the safety criteria of
                    the&nbsp;Weapons&nbsp;Masters must be immediately (and discreetly) returned to
                    storage&nbsp;</strong>(e.g.: your hotel room or vehicle) for the duration of the convention or be
                checked by the&nbsp;Weapons&nbsp;Master. Please note it is your responsibility to pick up your checked&nbsp;weapons.
                Any props or&nbsp;weapons&nbsp;left with the&nbsp;Weapons&nbsp;Master beyond the close of registration
                Sunday become the property of Otakuthon.</p>
            <p>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Convention&nbsp;staff reserve the right to inspect&nbsp;weapons,
                    peace bond and convention badge markings at any time.</strong>&nbsp;Any signs of tampering will be
                referred to the&nbsp;Weapons&nbsp;Master for confirmation of authenticity and possible confiscation.</p>
            <p>10.&nbsp;&nbsp;&nbsp;<strong>Horseplay (of any kind, whether participants are consenting parties or not)
                    with&nbsp;weapons&nbsp;will not be tolerated.</strong>&nbsp;All persons involved may be penalized
                depending upon the nature of the severity of the offense. All complaints of behavior of this nature will
                be dealt with immediately by Otakuthon.</p>
            <p>11.&nbsp;&nbsp;&nbsp;<strong>Failure to adhere to any of the above rules will result in any or all of the
                    following penalties being swiftly enforced:</strong></p>
            <ul>
                <li>Immediate loss of the privilege to carry&nbsp;weapons.</li>
                <li>Confiscation of the weapon without&nbsp;<span>possibility&nbsp;</span>of return.</li>
                <li>Expulsion from the convention without refund.</li>
                <li>Any act of gross negligence or public endangerment may result in criminal charges beyond the control
                    of Otakuthon (please remember that the general public may have no idea that the convention is in
                    progress and may react in the extreme if they feel threatened).
                </li>
            </ul>
            <p><span style="text-decoration: underline;">The decision of the&nbsp;Weapons&nbsp;Master and Otakuthon coordinators are final</span>&nbsp;and
                will be strictly enforced to ensure a safe environment for all convention attendees.</p>
            <hr>
            <h3>Clarifications</h3>
            <p>We receive many questions regarding specific types of weapons. This section will hopefully clarify some
                of those questions**:</p>
            <p><strong><span style="text-decoration: underline;">Guns:</span></strong></p>
            <ul class="unIndentedList">
                <li> Actual live fire arms are not permitted under <span style="text-decoration: underline;">any circumstance</span>!
                </li>
                <li> Airsoft, paintball and BB guns are not permitted under<span style="text-decoration: underline;"> any circumstance</span>!
                </li>
                <li> Nerf guns will be permitted as long as darts are not on your person and are not being fired on
                    convention grounds.
                </li>
                <li> Plastic cap guns are permitted along with water guns and other toy guns. <strong>However, i<strong>t</strong></strong><strong>
                        is not permitted to fire any liquid or use caps on convention grounds.</strong></li>
            </ul>
            <p><strong><span style="text-decoration: underline;">Metal:</span></strong></p>
            <ul class="unIndentedList">
                <li> Edged weapons are NOT permitted under <span
                            style="text-decoration: underline;">any circumstance</span>!
                </li>
                <li> Blunted metal weapons MAY be permitted at the discretion of the Weapons Master and the second in
                    command on a case-by-case basis.
                </li>
                <li> Weapons that have metal used in their making will be only permitted by the Weapons Master or
                    qualified staff that can approve this type of weapon (case-by-case basis).
                </li>
            </ul>
            <p><strong><span style="text-decoration: underline;">Wood:</span></strong></p>
            <ul class="unIndentedList">
                <li> Wooden weapons will be permitted as long as they follow the weapons policy.</li>
                <li> Please try to keep the weapons light and easy to manage to avoid hurting people by mistake.</li>
                <li> Bokkens will be permitted.</li>
            </ul>
            <p><strong><span style="text-decoration: underline;">Plastic:</span></strong></p>
            <ul class="unIndentedList">
                <li> Plastic weapons will be permitted in most cases as long as they follow the weapons policy.</li>
                <li> Weapons should be kept light and easy to manage to avoid accidentally hurting people.</li>
            </ul>
            <p><span style="font-weight: bold;">**NOTE: Even if a weapon meets the criteria of this section, it may still be rejected if it does not respect the weapons policy. Please contact the Weapons Master if you have any questions or doubts about your weapon.</span>
            </p>
            <hr>
            <p>If you have any questions, please contact the Otakuthon Weapons Master (<a
                        href="mailto:weapons@otakuthon.com"><span class="glyphicon glyphicon-envelope"></span>&nbsp;weapons@otakuthon.com</a>).
                While the Weapons Master may offer advice on which weapons are appropriate, we reserve the right to
                reclassify any weapons regardless of any information given prior to the convention.</p>
            <p><strong>Otakuthon reserves the right to confiscate any weapons for the duration of the convention or to
                    escort you outside the convention area and forbid you to return with the weapon. Aggravated or
                    repeated failure to obey the above policy may result in expulsion from the convention without
                    refund.</strong></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--AUTOGRAPH-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse4" id="autograph">Autograph Policy <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse4" class="col-md-6 collapse">

            <p>For all of you big fans out there, we know that getting the autograph of your favorite guest can be the
                highlight of the weekend.&nbsp; However, in order to maximize the number of people who can have this
                marvelous opportunity, please observe the following rules:</p>

            <ol>
                <li>Follow all directions provided by staff.</li>
                <li>Otakuthon cannot guarantee autographs for any particular guest. Late-comers run the chance of
                    missing their opportunity.&nbsp; We recommend arriving early. Some guests will only be signing a
                    fixed number of autographs regardless of the scheduled length of the autograph session.
                </li>
                <li>All guests will provide at least one autograph without charge, but additional autographs or photos
                    with guests may require an additional fee. Some guests may only provide a free autograph on the
                    Otakuthon program booklet.
                </li>
                <li>To keep the line moving and allow as many of your fellow attendees the opportunity to get their
                    turn:
                    <ul>
                        <li>Please observe a 30 second limit.</li>
                        <li>Please be sure to have your item to be signed out and ready when you are near the front of
                            the line.
                        </li>
                        <li>Priority may be given to attendees purchasing official merchandise from the guest.</li>
                    </ul>
                </li>
                <li>Staff reserve the right to inspect the item before it is presented to the guest.&nbsp; Items deemed
                    inappropriate or unsuitable (at their discretion) will be excluded from being signed.
                </li>
                <li>Guests will gladly sign your program book or any officially licensed goods. Guests may sign other
                    types of items at their discretion. DO NOT bring any bootleg items (they will not be signed).&nbsp;
                    If you are not sure, ask first.
                </li>
                <li>Always be respectful towards our guests. Anyone being rude, malicious, or intentionally
                    disrespectful towards guests or staff will be removed from the line and may be ejected from the
                    convention without refund.
                </li>
                <li>While we want as many people as possible to get their autograph opportunity, we reserve the right to
                    end the line and the autograph session at any time.
                </li>
                <li>We reserve the right to refuse access to any attendee who fails to follow the rules.</li>
            </ol>

            <p>Tips:</p>
            <ul>
                <li>Many guests have their own merchandise table in the Exhibition Hall.</li>
                <li>Arrive early to secure your opportunity.</li>
                <li>Be prepared.</li>
            </ul>

        </div>
        <div class="col-md-3"></div>
    </div>


</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>