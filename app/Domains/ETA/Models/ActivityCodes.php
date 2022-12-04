<?php

namespace App\Domains\ETA\Models;

use App\Domains\ETA\Models\Concerns\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class ActivityCodes extends Model
{
    use Sushi;
    use HasTranslations;

    /**
     * Get Sushi array record.
     *
     * @var array
     */
    protected array $rows = [
        [
            'code' => '0111',
            'desc_en' => 'Cultivation of grains and crops (except for rice), legumes and oilseeds',
            'desc_ar' => 'زراعة الحبوب والمحاصيل ( فيما عدا الارز ) والبقوليات والحبوب الزيتية',
        ],
        [
            'code' => '0112',
            'desc_en' => 'Cultivation of rice',
            'desc_ar' => 'زراعة الارز',
        ],
        [
            'code' => '0113',
            'desc_en' => 'Growing vegetables, melons, roots and tubers',
            'desc_ar' => 'زراعة الخضر ؤالبطيخ والجذور والدرنات',
        ],
        [
            'code' => '0114',
            'desc_en' => 'Cultivation of sugar cane',
            'desc_ar' => 'زراعة قصب السكر',
        ],
        [
            'code' => '0115',
            'desc_en' => 'Tobacco cultivation',
            'desc_ar' => 'زراعة التبغ',
        ],
        [
            'code' => '0116',
            'desc_en' => 'Growing fiber crops',
            'desc_ar' => 'زراعة المحاصيل ذات الالياف',
        ],
        [
            'code' => '0119',
            'desc_en' => 'Cultivation of other non-perennial crops',
            'desc_ar' => 'زراعة المحاصيل غير المعمرة الاخرى',
        ],
        [
            'code' => '0121',
            'desc_en' => 'the cultivation of grapevines.',
            'desc_ar' => 'زراعة الكروم',
        ],
        [
            'code' => '0122',
            'desc_en' => 'Growing tropical and subtropical fruits',
            'desc_ar' => 'زراعة الفواكه الاستوائية وشبه الاستوائية',
        ],
        [
            'code' => '0123',
            'desc_en' => 'Cultivation of citrus fruits',
            'desc_ar' => 'زراعة الموالح',
        ],
        [
            'code' => '0124',
            'desc_en' => 'Cultivation of fruit with Date kernel and from palm trees',
            'desc_ar' => 'زراعة الفواكة ذات النواة والناتجة عن انواع النخيل',
        ],
        [
            'code' => '0125',
            'desc_en' => 'Plant fruit trees and shrubs and other nuts',
            'desc_ar' => 'زراعة أشجار وشجيرات الفواكهة والمكسرات الاخرى',
        ],
        [
            'code' => '0126',
            'desc_en' => 'Growing oil fruits',
            'desc_ar' => 'زراعة الفواكهة الزيتية',
        ],
        [
            'code' => '0127',
            'desc_en' => 'Cultivation of the crops from which drinks are extracted',
            'desc_ar' => 'زراعة المحاصيل التى تستخرج منها المشروبات',
        ],
        [
            'code' => '0128',
            'desc_en' => 'Cultivation of spice crops, aromatics, medicine and pharmaceutical drugs',
            'desc_ar' => 'زراعة محاصيل التوابل والعطريات والادوية والعقاقير الصيدلانية',
        ],
        [
            'code' => '0129',
            'desc_en' => 'Cultivation of other perennial crops',
            'desc_ar' => 'زراعة المحاصيل المعمرة الاخرى',
        ],
        [
            'code' => '0130',
            'desc_en' => 'Crop breeding',
            'desc_ar' => 'تكاثر المحاصيل',
        ],
        [
            'code' => '0141',
            'desc_en' => 'Breeding of cattle and buffalo',
            'desc_ar' => 'تربية الماشية والجواميس',
        ],
        [
            'code' => '0142',
            'desc_en' => 'Breeding of horses and mare',
            'desc_ar' => 'تربية الخيول و الفرس',
        ],
        [
            'code' => '0143',
            'desc_en' => 'Breeding of camels',
            'desc_ar' => 'تربية الجمال والهجن',
        ],
        [
            'code' => '0144',
            'desc_en' => 'Breeding sheep and goats',
            'desc_ar' => 'تربية الخراف والماعز',
        ],
        [
            'code' => '0145',
            'desc_en' => 'Breeding of Pig',
            'desc_ar' => 'تربية الحنازير',
        ],
        [
            'code' => '0146',
            'desc_en' => 'Poultry farming',
            'desc_ar' => 'تربية الدواجن',
        ],
        [
            'code' => '0149',
            'desc_en' => 'Breeding other animals',
            'desc_ar' => 'تربية الحيوانات الاخرى',
        ],
        [
            'code' => '0150',
            'desc_en' => 'Mixed education',
            'desc_ar' => 'التربية المختلطة',
        ],
        [
            'code' => '0161',
            'desc_en' => 'Support activities for crop production',
            'desc_ar' => 'الانشطة الداعمة لانتاج المحاصيل',
        ],
        [
            'code' => '0162',
            'desc_en' => 'Activities in support of animal production',
            'desc_ar' => 'الانشطة الداعمة لانتاج الحيوانات',
        ],
        [
            'code' => '0163',
            'desc_en' => 'Post-harvest activities',
            'desc_ar' => 'الانشطة اللاحقة لحصاد المحاصيل',
        ],
        [
            'code' => '0164',
            'desc_en' => 'Preparing grains for reproduction',
            'desc_ar' => 'تجهيز الحبوب للتكاثر',
        ],
        [
            'code' => '0170',
            'desc_en' => 'Hunting, erection, and related service activities',
            'desc_ar' => 'الصيد ونصب الاشراك وانشطة الخدمات ذات الصلة',
        ],
        [
            'code' => '0210',
            'desc_en' => 'Forest care and forest-related activities',
            'desc_ar' => 'رعاية الغابات والانشطة المتصلة بالغابات',
        ],
        [
            'code' => '0220',
            'desc_en' => 'Wood cutting',
            'desc_ar' => 'قطع الاخشاب',
        ],
        [
            'code' => '0230',
            'desc_en' => 'Assembling non-wood forest products',
            'desc_ar' => 'تجميع المنتجات غير الخشبية بالغابات',
        ],
        [
            'code' => '0240',
            'desc_en' => 'Forest support services',
            'desc_ar' => 'الخدمات الداعمة للغابات',
        ],
        [
            'code' => '0311',
            'desc_en' => 'Fishing',
            'desc_ar' => 'الصيد البحرى',
        ],
        [
            'code' => '0312',
            'desc_en' => 'River fishing',
            'desc_ar' => 'الصيد النهرى',
        ],
        [
            'code' => '0321',
            'desc_en' => 'Marine farms',
            'desc_ar' => 'المزارع البحرية',
        ],
        [
            'code' => '0322',
            'desc_en' => 'River farms',
            'desc_ar' => 'المزارع النهرية',
        ],
        [
            'code' => '0411',
            'desc_en' => 'Earn a job',
            'desc_ar' => 'كسب عمل',
        ],
        [
            'code' => '0412',
            'desc_en' => 'Income from government agencies salaries',
            'desc_ar' => 'ايرادات من مرتبات جهات حكوميه',
        ],
        [
            'code' => '0413',
            'desc_en' => 'Income and salaries from the public business sector',
            'desc_ar' => 'إيرادات ومرتبات من قطاع الاعمال العام',
        ],
        [
            'code' => '0414',
            'desc_en' => 'Income and salaries from the private sector',
            'desc_ar' => 'ايرادات ومرتبات من قطاع خاص',
        ],
        [
            'code' => '0415',
            'desc_en' => 'Income and salary from non-subject entities',
            'desc_ar' => 'ايرادات ومرتبات من جهات غير خاضعه',
        ],
        [
            'code' => '0416',
            'desc_en' => 'Inspection and sting',
            'desc_ar' => 'تفتيش ودمغة',
        ],
        [
            'code' => '0441',
            'desc_en' => 'Income of agricultural lands',
            'desc_ar' => 'ايرادالاراضي الزراعيه',
        ],
        [
            'code' => '0442',
            'desc_en' => 'Revenue from constructed real estate',
            'desc_ar' => 'ايراد العقارات المبنيه',
        ],
        [
            'code' => '0444',
            'desc_en' => 'Income of real estate activities',
            'desc_ar' => 'ايراد الانشطه العقاريه',
        ],
        [
            'code' => '0451',
            'desc_en' => 'Errand stamp',
            'desc_ar' => 'دمغة مأمورية',
        ],
        [
            'code' => '0461',
            'desc_en' => 'Revenue from non-funders',
            'desc_ar' => 'ايرادات غير الممولين',
        ],
        [
            'code' => '0462',
            'desc_en' => 'Revenue of transferred capital',
            'desc_ar' => 'إيراد رؤوس الأموال المنقولة',
        ],
        [
            'code' => '0463',
            'desc_en' => 'Income earned from abroad',
            'desc_ar' => 'ايرادات محصله من الخارج',
        ],
        [
            'code' => '0464',
            'desc_en' => 'Other categories / miscellaneous other income',
            'desc_ar' => 'فئات اخري/ ايرادات اخري متنوعه',
        ],
        [
            'code' => '0471',
            'desc_en' => 'Free market revenue',
            'desc_ar' => 'ايرادات أسواق حرة',
        ],
        [
            'code' => '0472',
            'desc_en' => 'Free Zones revenue',
            'desc_ar' => 'ايرادات مناطق حره',
        ],
        [
            'code' => '0510',
            'desc_en' => 'Hard coal mining',
            'desc_ar' => 'تعدين الفحم الصلب',
        ],
        [
            'code' => '0520',
            'desc_en' => 'Lignite mining',
            'desc_ar' => 'تعدين الليجنيت',
        ],
        [
            'code' => '0610',
            'desc_en' => 'Extract the crude oil',
            'desc_ar' => 'استخرج البترول الخام',
        ],
        [
            'code' => '0620',
            'desc_en' => 'Extract natural gas',
            'desc_ar' => 'استخرج االغاز الطبيعى',
        ],
        [
            'code' => '0710',
            'desc_en' => 'Iron ore mining',
            'desc_ar' => 'تعدين الحديد الخام',
        ],
        [
            'code' => '0721',
            'desc_en' => 'Uranium and raw thorium mining',
            'desc_ar' => 'تعدين اليورانيوم والثوريوم الخام',
        ],
        [
            'code' => '0729',
            'desc_en' => 'Mining other non-ferrous metals',
            'desc_ar' => 'تعدين المعادن الخام الاخرى غير الحديدية',
        ],
        [
            'code' => '0810',
            'desc_en' => 'Quarrying to extract stones, sand and shale',
            'desc_ar' => 'استغلال المحاجر لاستخراج الاحجار والرمال والطفل',
        ],
        [
            'code' => '0891',
            'desc_en' => 'Chemical minerals and fertilizer extraction',
            'desc_ar' => 'استخراج المعادن الكيميائية والاسمدة',
        ],
        [
            'code' => '0892',
            'desc_en' => 'Peat extraction',
            'desc_ar' => 'استخراج الخث',
        ],
        [
            'code' => '0893',
            'desc_en' => 'Salt extraction',
            'desc_ar' => 'استخراج الملح',
        ],
        [
            'code' => '0899',
            'desc_en' => 'Other mining and quarrying activities are not elsewhere classified',
            'desc_ar' => 'الانشطة الاخرى للتعدين واستغلال المحاجر غير مصنفة فى موضع اخر',
        ],
        [
            'code' => '0910',
            'desc_en' => 'Service activities in support of oil and natural gas extraction',
            'desc_ar' => 'انشطة الخدمات الداعمة لاعمال استخراج البترول والغاز الطبيعى',
        ],
        [
            'code' => '0990',
            'desc_en' => 'Service activities in support of other mining and quarrying activities',
            'desc_ar' => 'انشطة الخدمات الداعمة للاعمال الاخرى للتعدين واستغلال المحاجر',
        ],
        [
            'code' => '1010',
            'desc_en' => 'Meat processing and preservation',
            'desc_ar' => 'تصنيع وحفظ اللحوم',
        ],
        [
            'code' => '1020',
            'desc_en' => 'Manufacture and preservation of fish, crustaceans and mollusks',
            'desc_ar' => 'تصنيع وحفظ الاسماك والقشريات والرخويات',
        ],
        [
            'code' => '1030',
            'desc_en' => 'Manufacturing and preserving fruits and vegetables',
            'desc_ar' => 'تصنيع وحفظ الفواكهة و الخضراوات',
        ],
        [
            'code' => '1040',
            'desc_en' => 'Manufacture of vegetable and animal oils and fats',
            'desc_ar' => 'تصنيع الزيوت و الدهون الحيوانية والنباتية',
        ],
        [
            'code' => '1050',
            'desc_en' => 'Dairy products manufacturing',
            'desc_ar' => 'تصنيع منتجات الالبان',
        ],
        [
            'code' => '1061',
            'desc_en' => 'Manufacture of grain mill products',
            'desc_ar' => 'تصنيع منتجات طواحين الحبوب',
        ],
        [
            'code' => '1062',
            'desc_en' => 'Manufacture of starch and starch products',
            'desc_ar' => 'تصنيع منتجات النشاء ومنتجات النشاء',
        ],
        [
            'code' => '1071',
            'desc_en' => 'Manufacturing bakery products',
            'desc_ar' => 'تصنيع منتجات المخابز',
        ],
        [
            'code' => '1072',
            'desc_en' => 'Sugar industry',
            'desc_ar' => 'صناعة السكر',
        ],
        [
            'code' => '1073',
            'desc_en' => 'Manufacture of cocoa, chocolate and sugar confectionery',
            'desc_ar' => 'تصنيع الكاكاو والشيكولاتة والحلويات السكرية',
        ],
        [
            'code' => '1074',
            'desc_en' => 'Manufacturing pasta, strips, couscous and similar starchy products',
            'desc_ar' => 'تصنيع المعكرونة وشرائطها والكسكسى والمنتجات النشوية المماثلة',
        ],
        [
            'code' => '1075',
            'desc_en' => 'Meals and ready-made food industry',
            'desc_ar' => 'صناعة الوجبات و الاغذية الجاهزة',
        ],
        [
            'code' => '1079',
            'desc_en' => 'Manufacture of other products not classified elsewhere',
            'desc_ar' => 'صناعة المنتجات الاخرى غير مصنفة فى موضع اخر',
        ],
        [
            'code' => '1080',
            'desc_en' => 'Prepared animal food industry',
            'desc_ar' => 'صناعة الاغذية الحيوانية المجهزة',
        ],
        [
            'code' => '1101',
            'desc_en' => 'Spirits distilled, refined and mixed',
            'desc_ar' => 'تقطير المشروبات الروحية وتكريرها وخلطها',
        ],
        [
            'code' => '1102',
            'desc_en' => 'Winemaking',
            'desc_ar' => 'صناعة النبيذ',
        ],
        [
            'code' => '1103',
            'desc_en' => 'The manufacture of alcoholic drinks derived from the molten and the manufacture of molten',
            'desc_ar' => 'صناعة المشروبات الكحولية المشتقة من المولت وصنع المولت',
        ],
        [
            'code' => '1104',
            'desc_en' => 'Manufacturing soft drinks and producing mineral water',
            'desc_ar' => 'صناعة المشروبات المرطبة وانتاج المياة المعدنية',
        ],
        [
            'code' => '1200',
            'desc_en' => 'Manufacture of tobacco products',
            'desc_ar' => 'صناعة منتجات التبغ',
        ],
        [
            'code' => '1311',
            'desc_en' => 'Processing and spinning of textile fibers',
            'desc_ar' => 'تجهيز وغزل الياف المنسوجات',
        ],
        [
            'code' => '1312',
            'desc_en' => 'Textile weave',
            'desc_ar' => 'نسج المنسوجات',
        ],
        [
            'code' => '1313',
            'desc_en' => 'The textile industry',
            'desc_ar' => 'صناعة المنسوجات',
        ],
        [
            'code' => '1391',
            'desc_en' => 'Manufacture of knitted and crocheted fabrics',
            'desc_ar' => 'صناعة الاقمشة التريكو والكروشية',
        ],
        [
            'code' => '1392',
            'desc_en' => 'Manufacture of ready-made textile accessories, except garment wear',
            'desc_ar' => 'صناعة مستلزمات المنسوجات الجاهزة باستثناء ملابس الزينة',
        ],
        [
            'code' => '1393',
            'desc_en' => 'Carpet and blanket industry',
            'desc_ar' => 'صناعة السجاد والبطاطين',
        ],
        [
            'code' => '1394',
            'desc_en' => 'Manufacture of ropes, thick and double ropes and nets',
            'desc_ar' => 'صناعة الحبال والحبال الغليظة والمذدوجة والشباك',
        ],
        [
            'code' => '1399',
            'desc_en' => 'Other textile industry not elsewhere classified',
            'desc_ar' => 'صناعة المنسوجات الاخرى غير مصنفة فى موضع اخر',
        ],
        [
            'code' => '1410',
            'desc_en' => 'Manufacture of garment with the exception of fur',
            'desc_ar' => 'صناعة الملابس ذات الزينة باستثناء الفراء',
        ],
        [
            'code' => '1420',
            'desc_en' => 'Fur accessories industry',
            'desc_ar' => 'صناعة مستلزمات الفراء',
        ],
        [
            'code' => '1430',
            'desc_en' => 'The manufacture of clothing, knitted and crocheted',
            'desc_ar' => 'صناعة ملابس الزينة بالتريكو والكروشية',
        ],
        [
            'code' => '1511',
            'desc_en' => 'Tanning and processing of leather, fillings and dyeing of fur',
            'desc_ar' => 'دبغ وتجهيز الجلود والحشوات وصباغة الفراء',
        ],
        [
            'code' => '1512',
            'desc_en' => 'Luggage, handbags and similar industries, along with saddles and horse sets',
            'desc_ar' => 'صناعة حفائب الامتعة وحقائب اليد وما شابهة ذلك الى جانب السروج واطقم الجياد',
        ],
        [
            'code' => '1520',
            'desc_en' => 'Shoe manufacturing',
            'desc_ar' => 'صناعة الاحذية',
        ],
        [
            'code' => '1610',
            'desc_en' => 'Sawing wood and abrasion',
            'desc_ar' => 'نشر الخشب وسحجة',
        ],
        [
            'code' => '1621',
            'desc_en' => 'Sheets made of wood veneer and wood-based panels',
            'desc_ar' => 'الصفائح من قشرة الخشب والالواح ذات الاساس الخشبى',
        ],
        [
            'code' => '1622',
            'desc_en' => 'Manufacture of carpentry accessories intended for buildings and installations',
            'desc_ar' => 'صناعة مستلزمات النجارة المعدة للابنية والمنشات',
        ],
        [
            'code' => '1623',
            'desc_en' => 'Wooden boxes industry',
            'desc_ar' => 'صناعة الصناديق الخشبية',
        ],
        [
            'code' => '1629',
            'desc_en' => 'Manufacture of wood, wood products and cork, except furniture, and manufacture of articles produced from straw and sheets',
            'desc_ar' => 'صناعة الاخشاب والمنتجات الخشبية والفلين باستثناء الاثاث وصناعة الاصناف المنتجة من القش والصفائح',
        ],
        [
            'code' => '1701',
            'desc_en' => 'Paper and carvatard pulp industry',
            'desc_ar' => 'صناعة عجائن الورق و الورق المقوى ( الكارتون )',
        ],
        [
            'code' => '1702',
            'desc_en' => 'Manufacture of corrugated paper and paperboard and boxes made of paper and paperboard',
            'desc_ar' => 'صناعة الورق والورق المقوى المموج والصناديق المصنوعة من الورق والورق المقوى',
        ],
        [
            'code' => '1709',
            'desc_en' => 'Manufacture of other articles of paper and paperboard',
            'desc_ar' => 'صناعة اصناف اخرى من الورق والورق المقوى',
        ],
        [
            'code' => '1811',
            'desc_en' => 'printing',
            'desc_ar' => 'الطباعة',
        ],
        [
            'code' => '1812',
            'desc_en' => 'Printing service activities',
            'desc_ar' => 'انشطة الخدمات المرتبطة بالطباعة',
        ],
        [
            'code' => '1820',
            'desc_en' => 'Clone recorded media',
            'desc_ar' => 'استنساخ وسائل الاعلام المسجلة',
        ],
        [
            'code' => '1910',
            'desc_en' => 'Coke oven products industry',
            'desc_ar' => 'صناعة منتجات افران الكوك',
        ],
        [
            'code' => '1920',
            'desc_en' => 'Refined petroleum products',
            'desc_ar' => 'المنتجات النفطية المكررة',
        ],
        [
            'code' => '2011',
            'desc_en' => 'Basic chemicals',
            'desc_ar' => 'المواد الكيميائية الاساسية',
        ],
        [
            'code' => '2012',
            'desc_en' => 'Manufacture of fertilizers and nitrogen compounds',
            'desc_ar' => 'صناعة الاسمدة والمركبات الازوتية',
        ],
        [
            'code' => '2013',
            'desc_en' => 'Plastics industry in its primary forms and synthetic rubber',
            'desc_ar' => 'صناعة اللادائن فى اشكالها الاولية والمطاط الصناعى',
        ],
        [
            'code' => '2021',
            'desc_en' => 'Pesticide industry and other agricultural chemical products',
            'desc_ar' => 'صناعة مبيدات الافات والمنتجات الكيميائية الزراعية الاخرى',
        ],
        [
            'code' => '2022',
            'desc_en' => 'Manufacture of paints, varnishes, and similar coatings, printing inks and molds',
            'desc_ar' => 'صناعة الدهانات والورنيش والطلاء المماثلة واحبار الطباعة والمصطكات',
        ],
        [
            'code' => '2023',
            'desc_en' => 'Manufacture of soap, disinfectants, cleaning and polishing preparations, perfumes and cosmetics',
            'desc_ar' => 'صناعة الصابون والمطهرات ومستحضرات التنظيف والتلميع والعطور ومستحضرات التجميل',
        ],
        [
            'code' => '2029',
            'desc_en' => 'Manufacture of other chemical products not classified elsewhere',
            'desc_ar' => 'صناعة المنتجات الكيميائية الاخرى غير المصنفة فى موضع اخر',
        ],
        [
            'code' => '2030',
            'desc_en' => 'Industrial fiber industry',
            'desc_ar' => 'صناعة الالياف الصناعية',
        ],
        [
            'code' => '2100',
            'desc_en' => 'Manufacture of pharmaceutical, chemical, and plant products',
            'desc_ar' => 'صناعة المستحضرات الصيدلانية والكيميائية الدواءية والمنتجات النباتية',
        ],
        [
            'code' => '2211',
            'desc_en' => 'Manufacture of rubber tires and tubes, renewing and rebuilding the outer surfaces of rubber tires',
            'desc_ar' => 'صناعة الاطارات والانابيب المطاطية وتجديد الاسطح الخارجية للاطارات المطاطية واعادة بنائها',
        ],
        [
            'code' => '2219',
            'desc_en' => 'Manufacture of other rubber products',
            'desc_ar' => 'صناعة المنتجات المطاطية الاخرى',
        ],
        [
            'code' => '2220',
            'desc_en' => 'Plastics industry',
            'desc_ar' => 'صناعة منتجات اللادائن',
        ],
        [
            'code' => '2310',
            'desc_en' => 'Glass and its products industry',
            'desc_ar' => 'صناعة الزجاج ومنتجاتة',
        ],
        [
            'code' => '2391',
            'desc_en' => 'Manufacture of fusion products',
            'desc_ar' => 'صناعة المنتجات المقاومة للانصهار',
        ],
        [
            'code' => '2392',
            'desc_en' => 'Manufacture of Shale products for Building',
            'desc_ar' => 'صناعة مواد الطفلة الخاصة بالبناء',
        ],
        [
            'code' => '2393',
            'desc_en' => 'Manufacture of other Porcelain and ceramic products',
            'desc_ar' => 'صناعة منتجات البرسولين والسيراميك الاخرى',
        ],
        [
            'code' => '2394',
            'desc_en' => 'Cement, lime and plaster industry',
            'desc_ar' => 'صناعة الاسمنت والجير والجص',
        ],
        [
            'code' => '2395',
            'desc_en' => 'Manufacture of concrete products, cement and plaster',
            'desc_ar' => 'صناعة منتجات الخرسانة والاسمنت والجص',
        ],
        [
            'code' => '2396',
            'desc_en' => 'Cutting, forming and completing the stone processing',
            'desc_ar' => 'قطع وتشكيل واتمام تجهيز الاحجار',
        ],
        [
            'code' => '2399',
            'desc_en' => 'Manufacture of non-metallic minerals products not classified elsewhere',
            'desc_ar' => 'صناعة منتجات المعادن الافلزية الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '2410',
            'desc_en' => 'The industry of basic iron and steel',
            'desc_ar' => 'صناعة الحديد والصلب القاعديين',
        ],
        [
            'code' => '2420',
            'desc_en' => 'Manufacture of precious and non-ferrous basic metals',
            'desc_ar' => 'صناعة الفلزات الثمينة وغير الحديدية القاعدية',
        ],
        [
            'code' => '2431',
            'desc_en' => 'Iron and steel casting',
            'desc_ar' => 'سبك الحديدوالصلب',
        ],
        [
            'code' => '2432',
            'desc_en' => 'Non-ferrous metal casting',
            'desc_ar' => 'سبك المعادن غير الحديدية',
        ],
        [
            'code' => '2511',
            'desc_en' => 'Structural metal products industry',
            'desc_ar' => 'صناعة المنتجات المعدنية الانشائية',
        ],
        [
            'code' => '2512',
            'desc_en' => 'Industry of tanks and metal containers',
            'desc_ar' => 'صناعة الصهاريج والخزانات و الحاويات المعدنية',
        ],
        [
            'code' => '2513',
            'desc_en' => 'Water vapor generators except for central heating boilers in hot water',
            'desc_ar' => 'مولدات بخار الماء باستثناء مراجل التدفئةالمركزية بالمياة الساخنة',
        ],
        [
            'code' => '2520',
            'desc_en' => 'Arms and ammunition industry',
            'desc_ar' => 'صناعة الاسلحة والذخائر',
        ],
        [
            'code' => '2591',
            'desc_en' => 'Forming metals by hammering, pressing, casting, rolling, and treatment of metal powders',
            'desc_ar' => 'تشكيل المعادن بالطرق والكبس و السبك والدلفنة ومعالجة مساحيق المعادن',
        ],
        [
            'code' => '2592',
            'desc_en' => 'Metal processing and coating',
            'desc_ar' => 'معالجة وطلى المعادن',
        ],
        [
            'code' => '2593',
            'desc_en' => 'Manufacture of cutting tools, hand tools and general metal tools',
            'desc_ar' => 'صناعة ادوات القطع والعدد اليدوية والادوات المعدنية العامة',
        ],
        [
            'code' => '2599',
            'desc_en' => 'Manufacture of other fabricated metal products not classified elsewhere',
            'desc_ar' => 'صناعة منتجات المعادن المشكلة الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '2610',
            'desc_en' => 'Electronic components and panels industry',
            'desc_ar' => 'صناعة المكونات والالواح الاليكترونية',
        ],
        [
            'code' => '2620',
            'desc_en' => 'The manufacture of electronic computers and related devices',
            'desc_ar' => 'صناعة الحاسبات الاليكترونية و الاجهزة المتصلة بة',
        ],
        [
            'code' => '2630',
            'desc_en' => 'Communications equipment industry',
            'desc_ar' => 'صناعة اجهزة الاتصالات',
        ],
        [
            'code' => '2640',
            'desc_en' => 'Electronic devices industry',
            'desc_ar' => 'صناعة الاجهزة الاليكترونية',
        ],
        [
            'code' => '2651',
            'desc_en' => 'Manufacturing measuring, testing, navigation and control devices',
            'desc_ar' => 'صناعة اجهزة القياس والاختبار و الملاحة والتحكم',
        ],
        [
            'code' => '2652',
            'desc_en' => 'Watch and alarm clock industry',
            'desc_ar' => 'صناعة الساعات والمنبهات',
        ],
        [
            'code' => '2660',
            'desc_en' => 'Radiation, medical and therapeutic electronic devices industry',
            'desc_ar' => 'صناعة الاجهزة الاشعاعية والطبية والعلاجية اللاليكترونية',
        ],
        [
            'code' => '2670',
            'desc_en' => 'Optical equipment and imaging equipment industry',
            'desc_ar' => 'صناعة المعدات البصرية واجهزة التصوير',
        ],
        [
            'code' => '2680',
            'desc_en' => 'Optical and magnetic conveyor industry',
            'desc_ar' => 'صناعة الوسائل الناقلة البصرية والمغنطيسية',
        ],
        [
            'code' => '2710',
            'desc_en' => 'Manufacture of motors, generators, electrical transformers, devices and control panels for electricity distribution',
            'desc_ar' => 'صناعة المحركات والمولدات والمحولات الكهربائية واجهزة ولوحات التحكم فى توزيع الكهرباء',
        ],
        [
            'code' => '2720',
            'desc_en' => 'Manufacture of dry and stored batteries',
            'desc_ar' => 'صناعة البطاريات الجافة والمختزنة',
        ],
        [
            'code' => '2731',
            'desc_en' => 'Industrial fiber cable industry',
            'desc_ar' => 'صناعة كابلات الالياف الصناعية',
        ],
        [
            'code' => '2732',
            'desc_en' => 'Other electrical and electronic wires and cables',
            'desc_ar' => 'صناعة الاسلاك الكهربائية والاليكترونية الاخرى والكابلات',
        ],
        [
            'code' => '2733',
            'desc_en' => 'Wire devices industry',
            'desc_ar' => 'صناعة اجهزة الاسلاك',
        ],
        [
            'code' => '2740',
            'desc_en' => 'Electrical lighting devices industry',
            'desc_ar' => 'صناعة اجهزة الانارة الكهربائية',
        ],
        [
            'code' => '2750',
            'desc_en' => 'Home appliances industry',
            'desc_ar' => 'صناعة الاجهزة المنزلية',
        ],
        [
            'code' => '2790',
            'desc_en' => 'Other electrical appliances industry',
            'desc_ar' => 'صناعة الاجهزة الكهربائية الاخرى',
        ],
        [
            'code' => '2811',
            'desc_en' => 'Manufacture of generators and engines, with the exception of aircraft, vehicles and motorcycles',
            'desc_ar' => 'صناعة المولدات والمحركات باسقثناء الطائرات والمركبات ومحركات الموتيسيكلات',
        ],
        [
            'code' => '2812',
            'desc_en' => 'Liquid power devices industry',
            'desc_ar' => 'صناعة اجهزة الطاقة السائلة',
        ],
        [
            'code' => '2813',
            'desc_en' => 'Manufacture of pumps, compressors, tapes and other valves',
            'desc_ar' => 'صناعة المضخات والضواغط والاشرطة والصمامات الاخرى',
        ],
        [
            'code' => '2814',
            'desc_en' => 'Gears, carriers and driving devices industry',
            'desc_ar' => 'صناعة التروس والحاملات واجهزة القيادة',
        ],
        [
            'code' => '2815',
            'desc_en' => 'Manufacture of furnaces, furnaces and their incinerators',
            'desc_ar' => 'صناعة الافران و الاتونات ومحرقاتها',
        ],
        [
            'code' => '2816',
            'desc_en' => 'The elevators and equipment needed for it',
            'desc_ar' => 'صناعة المصاعد والمعدات الازمة لها',
        ],
        [
            'code' => '2817',
            'desc_en' => 'Manufacture of office equipment and equipment (excluding electronic computers and their accessories)',
            'desc_ar' => 'صناعة الاجهزة والمعدات المكتبية ( باستثناء الحاسبات الاليكترونية ومستلزماتها )',
        ],
        [
            'code' => '2818',
            'desc_en' => 'Manufacture of manual power steering equipment',
            'desc_ar' => 'صناعة المعدات اليدوية لتوجية الطاقة',
        ],
        [
            'code' => '2819',
            'desc_en' => 'Other equipment industry of various purposes',
            'desc_ar' => 'صناعة المعدات الاخرى ذات الاغراض المتنوعة',
        ],
        [
            'code' => '2821',
            'desc_en' => 'Agricultural and forestry equipment industry',
            'desc_ar' => 'صناعة المعدات الزراعية والخاصة بالغابات',
        ],
        [
            'code' => '2822',
            'desc_en' => 'Manufacture of equipment and machinery for forming metals',
            'desc_ar' => 'صناعة معدات واجهزة تشكيل المعادن',
        ],
        [
            'code' => '2823',
            'desc_en' => 'Metal equipment industry',
            'desc_ar' => 'صناعة معدات المعادن',
        ],
        [
            'code' => '2824',
            'desc_en' => 'Mining and quarrying and building equipment industry',
            'desc_ar' => 'صناعة معدات المناجم و المحاجر والبناء',
        ],
        [
            'code' => '2825',
            'desc_en' => 'Manufacture of food, beverage and tobacco industries equipment',
            'desc_ar' => 'صناعة معدات الصناعات الغذائية والمشرؤبات والتبغ',
        ],
        [
            'code' => '2826',
            'desc_en' => 'Manufacture of ready-made clothes, accessories, and leather production',
            'desc_ar' => 'صناعة معدات الملابس الجاهزة وهدوات الزينة وانتاج الجلود',
        ],
        [
            'code' => '2829',
            'desc_en' => 'Manufacture of other special-purpose equipment',
            'desc_ar' => 'صناعة المعدات الاخرى ذات الاغراض الخاصة',
        ],
        [
            'code' => '2910',
            'desc_en' => 'Manufacture of motor vehicles',
            'desc_ar' => 'صناعة المركبات ذات المحركات',
        ],
        [
            'code' => '2920',
            'desc_en' => 'Manufacture of motor vehicle bodies and the manufacture of trailers and semi-trailers',
            'desc_ar' => 'صناعة هياكل المركبات ذات المحركات وصناعة المقطورات ونصف المقطورات',
        ],
        [
            'code' => '2930',
            'desc_en' => 'Manufacture of accessories and spare parts for motor vehicles',
            'desc_ar' => 'صناعة مستلزمات وقطع غيار المركبات ذات المحركات',
        ],
        [
            'code' => '3011',
            'desc_en' => 'Building ship hulls and rafts',
            'desc_ar' => 'بناء هياكل السفن و الطوافات',
        ],
        [
            'code' => '3012',
            'desc_en' => 'Manufacture of pleasure boats and sport boats',
            'desc_ar' => 'صناعة قوارب النزهة والقوارب الرياضية',
        ],
        [
            'code' => '3020',
            'desc_en' => 'Railroad locomotives and rolling stock industry',
            'desc_ar' => 'صناعة قاطرات السكك الحديدية والمعدات الدارجة على السكك الحديدية',
        ],
        [
            'code' => '3030',
            'desc_en' => 'Air and spacecraft industry',
            'desc_ar' => 'صناعة المركبات الهوائية والفضائية',
        ],
        [
            'code' => '3040',
            'desc_en' => 'Manufacture of military military vehicles',
            'desc_ar' => 'صناعة المركبات العسكرية الحربية',
        ],
        [
            'code' => '3091',
            'desc_en' => 'Industry',
            'desc_ar' => 'صناعة',
        ],
        [
            'code' => '3092',
            'desc_en' => 'Manufacture of ordinary bicycles and infirm vehicles',
            'desc_ar' => 'صناعة الدراجات العادية ومركبات العجزة',
        ],
        [
            'code' => '3099',
            'desc_en' => 'Other transportation equipment industry not classified elsewhere',
            'desc_ar' => 'صناعة معدات النقل الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '3100',
            'desc_en' => 'Furniture Industry',
            'desc_ar' => 'صناعة الاثاث',
        ],
        [
            'code' => '3211',
            'desc_en' => 'Manufacture of jewelry and related items',
            'desc_ar' => 'صناعة المجوهرات والاصناف المتصلة بها',
        ],
        [
            'code' => '3212',
            'desc_en' => 'Manufacture of imitation jewelry and related items',
            'desc_ar' => 'صناعة المجوهرات المقلدة والاصناف المتصلة بها',
        ],
        [
            'code' => '3220',
            'desc_en' => 'Musical instrument industry',
            'desc_ar' => 'صناعة الالات الموسيقية',
        ],
        [
            'code' => '3230',
            'desc_en' => 'Sports products industry',
            'desc_ar' => 'صناعة المنتجات الرياضية',
        ],
        [
            'code' => '3240',
            'desc_en' => 'Make games and play',
            'desc_ar' => 'صناعة الالعاب واللعب',
        ],
        [
            'code' => '3250',
            'desc_en' => 'Manufacturing of dental and medical equipment and tools',
            'desc_ar' => 'صناعة المعدات والادوات الطبية والخاصة بالاسنان',
        ],
        [
            'code' => '3290',
            'desc_en' => 'Other industries not classified elsewhere',
            'desc_ar' => 'الصناعات الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '3311',
            'desc_en' => 'Repair of manufactured metal products',
            'desc_ar' => 'اصلاح المنتجات المعدنية المصنعة',
        ],
        [
            'code' => '3312',
            'desc_en' => 'Machinery repair',
            'desc_ar' => 'اصلاح الالات',
        ],
        [
            'code' => '3313',
            'desc_en' => 'Repair of electronic and optical devices',
            'desc_ar' => 'اصلاح الاجهزة الاليكترونية و البصرية',
        ],
        [
            'code' => '3314',
            'desc_en' => 'Electronic devices repair',
            'desc_ar' => 'اصلاح الاجهزة الاليكترونية',
        ],
        [
            'code' => '3315',
            'desc_en' => 'Repair of transport devices, except for motor vehicles',
            'desc_ar' => 'اصلاح اجهزة النقل باستثناء المركبات ذات المحركات',
        ],
        [
            'code' => '3319',
            'desc_en' => 'Repair other devices',
            'desc_ar' => 'اصلاح الاجهزة الاخرى',
        ],
        [
            'code' => '3320',
            'desc_en' => 'Installation of industrial equipment and devices',
            'desc_ar' => 'تركيب المعدات و الاجهزة الصناعية',
        ],
        [
            'code' => '3510',
            'desc_en' => 'Electric generators, transformers and power distributors',
            'desc_ar' => 'المولدات الكهربائية ومحولات وموزعات الكهرباء',
        ],
        [
            'code' => '3520',
            'desc_en' => 'Manufacture of sulfur gas and distribution of gaseous fuels by means of main pipes',
            'desc_ar' => 'صناعة غاز الاستصباح وتوزيع انواع الوقود الغازية عن طريق مواسير رئيسية',
        ],
        [
            'code' => '3530',
            'desc_en' => 'Steam supply and air conditioning',
            'desc_ar' => 'توريد البخار واجهزة تكييف الهواء',
        ],
        [
            'code' => '3600',
            'desc_en' => 'Water collection, treatment and supply',
            'desc_ar' => 'تجميع ومعالجة وتوريد المياة',
        ],
        [
            'code' => '3700',
            'desc_en' => 'Sewer',
            'desc_ar' => 'المجارى',
        ],
        [
            'code' => '3811',
            'desc_en' => 'Collection of non-hazardous waste',
            'desc_ar' => 'تجميع المخلفات غير الخطرة',
        ],
        [
            'code' => '3812',
            'desc_en' => 'Collection of hazardous waste',
            'desc_ar' => 'تجميع المخلفات الخطرة',
        ],
        [
            'code' => '3821',
            'desc_en' => 'Treatment and disposal of non-hazardous waste',
            'desc_ar' => 'معالجة والتصرف فى المخلفات غير الخطرة',
        ],
        [
            'code' => '3822',
            'desc_en' => 'Treatment and disposal of hazardous waste',
            'desc_ar' => 'معالجة والتصرف فى المخلفات الخطرة',
        ],
        [
            'code' => '3830',
            'desc_en' => 'Material handling',
            'desc_ar' => 'معالجة المواد',
        ],
        [
            'code' => '3900',
            'desc_en' => 'Recycling activities and services and the disposal of other waste',
            'desc_ar' => 'انشطة وخدمات اعادة التدوير والتصرف فى النفايات الاخرى',
        ],
        [
            'code' => '4100',
            'desc_en' => 'Building constructions',
            'desc_ar' => 'انشاءات المبانى',
        ],
        [
            'code' => '4210',
            'desc_en' => 'Road and railway constructions',
            'desc_ar' => 'الانشاءات الخاصة بالطرق والسكك الحديدية',
        ],
        [
            'code' => '4220',
            'desc_en' => 'Construction for projects of public benefit',
            'desc_ar' => 'الانشاءات الخاصة بالمشاريع ذات المنفعة العامة',
        ],
        [
            'code' => '4290',
            'desc_en' => 'Construction for other civil engineering projects',
            'desc_ar' => 'الانشاءات الخاصة بالمشاريع الهندسية المدنية الاخرى',
        ],
        [
            'code' => '4311',
            'desc_en' => 'Remove the installations',
            'desc_ar' => 'ازالة المنشات',
        ],
        [
            'code' => '4312',
            'desc_en' => 'Preparing sites',
            'desc_ar' => 'اعداد المواقع',
        ],
        [
            'code' => '4321',
            'desc_en' => 'Electrical installations',
            'desc_ar' => 'التركيبات الكهربائية',
        ],
        [
            'code' => '4322',
            'desc_en' => 'Plumbing, heating and air-conditioning installations',
            'desc_ar' => 'التركيبات الخاصة بالسباكة والتدفئة ومكيفات الهواء',
        ],
        [
            'code' => '4329',
            'desc_en' => 'Other structural installations',
            'desc_ar' => 'التركيبات الانشائية الاخرى',
        ],
        [
            'code' => '4330',
            'desc_en' => 'Completion and finishing of buildings',
            'desc_ar' => 'استكمال وتشطيب المبانى',
        ],
        [
            'code' => '4390',
            'desc_en' => 'Other specialized construction activities',
            'desc_ar' => 'انشطة الانشاءات المتخصصة الاخرى',
        ],
        [
            'code' => '4510',
            'desc_en' => 'Sale of motor vehicles',
            'desc_ar' => 'بيع المركبات ذات المحركات',
        ],
        [
            'code' => '4520',
            'desc_en' => 'Maintenance and repair of motor vehicles',
            'desc_ar' => 'صيانة واصلاح المركبات ذات المحركات',
        ],
        [
            'code' => '4530',
            'desc_en' => 'Sale of motor vehicle parts and accessories',
            'desc_ar' => 'بيع قطع غيار ومستلزمات المركبات ذات المحركات',
        ],
        [
            'code' => '4540',
            'desc_en' => 'Sale, maintenance and repair of motorcycles, parts and accessories thereof',
            'desc_ar' => 'بيع وصيانة واصلاح الدراجات النارية وقطع الغيار والمستلزمات الخاصة بها',
        ],
        [
            'code' => '4610',
            'desc_en' => 'Wholesale trade on the basis of a contract or a fee',
            'desc_ar' => 'تجارة الجملة على اساس عقد او نظير رسم',
        ],
        [
            'code' => '4620',
            'desc_en' => 'Wholesale trade in agricultural raw materials and live animals',
            'desc_ar' => 'تجارة الجملة الخاصة بالمواد الاولية الزراعية والحيوانات الحية',
        ],
        [
            'code' => '4630',
            'desc_en' => 'Wholesale trade of food, beverages and tobacco',
            'desc_ar' => 'تجارة الجملة الخاصة بالاغذية والمشرؤبات والتبغ',
        ],
        [
            'code' => '4641',
            'desc_en' => 'Wholesale trade of clothes, fabrics and shoes',
            'desc_ar' => 'تجارة الجملة الخاصة بالملابس والاقمشة والاحذية',
        ],
        [
            'code' => '4649',
            'desc_en' => 'Wholesale trade for other household appliances',
            'desc_ar' => 'تجارة الجملة الخاصة بالادوات المنزلية الاخرة',
        ],
        [
            'code' => '4651',
            'desc_en' => 'Wholesale trade of computer hardware, accessories and computer software',
            'desc_ar' => 'تجارة الجملة الخاصة باجهزة الكمبيوتر ومستلزماتها وبرامج الكمبيوتر',
        ],
        [
            'code' => '4652',
            'desc_en' => 'Wholesale trade of electronic devices, communications devices and accessories',
            'desc_ar' => 'تجارة الجملة الخاصة بالاجهزة الاليكترونية واجهزة الاتصالات ومستلزماتها',
        ],
        [
            'code' => '4653',
            'desc_en' => 'Wholesale trade for agricultural equipment, machinery and supplies',
            'desc_ar' => 'تجارة الجملة الخاصة بالمعدات والالات والتوريدات الزراعية',
        ],
        [
            'code' => '4659',
            'desc_en' => 'Wholesale trade of equipment and other devices',
            'desc_ar' => 'تجارة الجملة الخاصة بالمعدات والاجهزة الاخرى',
        ],
        [
            'code' => '4661',
            'desc_en' => 'Wholesale trade of dry, liquid and gaseous fuels and related products',
            'desc_ar' => 'تجارة الجملة الخاصة بالوقود الجاف والسائل والغازى والمنتجات المرتبطة بذلك',
        ],
        [
            'code' => '4662',
            'desc_en' => 'Wholesale trade in precious metals and minerals',
            'desc_ar' => 'تجارة الجملة الخاصة بالمعادن والمعادن النفيسة',
        ],
        [
            'code' => '4663',
            'desc_en' => 'Wholesale trade, supplies and equipment for building materials, hardware, plumbing and heating appliances',
            'desc_ar' => 'تجارة الجملة والتوريدات والاجهزة الخاصة بمواد البناء والادوات المعدنية والسباكة واجهزة التدفئة',
        ],
        [
            'code' => '4669',
            'desc_en' => 'Wholesale trade for waste, waste and other products not classified elsewhere',
            'desc_ar' => 'تجارة الجملة الخاصة بالنفايات والمخلفات والمنتجات الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '4690',
            'desc_en' => 'Non-specialized wholesale trade',
            'desc_ar' => 'تجارة الجملة غير المتخصصة',
        ],
        [
            'code' => '4711',
            'desc_en' => 'Retail sale in non-specialized stores of food, beverages or tobacco',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر غير المتخصصة للاغذية والمشروبات اوالتبغ',
        ],
        [
            'code' => '4719',
            'desc_en' => 'Other retail types in non-specialized stores',
            'desc_ar' => 'انواع البيع بالتجزئةالاخرى بالمتاجر غير المتخصصة',
        ],
        [
            'code' => '4721',
            'desc_en' => 'Retail sale in specialized food stores',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للاغذية',
        ],
        [
            'code' => '4722',
            'desc_en' => 'Retail sale in specialized stores for drinks',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للمشروبات',
        ],
        [
            'code' => '4723',
            'desc_en' => 'Retail sale in specialized stores of tobacco products',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة لمنتجات التبغ',
        ],
        [
            'code' => '4730',
            'desc_en' => 'Retail sale of specialized vehicles for fuel',
            'desc_ar' => 'البيع بالتجزئة بالاماكن المتخصصة لوقود المركبات',
        ],
        [
            'code' => '4741',
            'desc_en' => 'Retail sale in stores specialized in computer hardware, accessories, computer software, and communications equipment',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة فى اجهزة الحاسب الالى ومستلزماتة وبرامج الكمبيوتر واجهزة الاتصالات',
        ],
        [
            'code' => '4751',
            'desc_en' => 'Retail sale in clothing stores',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة فى الملابس',
        ],
        [
            'code' => '4752',
            'desc_en' => 'Retail sale in specialized stores of hardware, paint and glass',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للادوات المعدنية و الطلاء والزجاج',
        ],
        [
            'code' => '4753',
            'desc_en' => 'Retail sale in specialized stores of carpets, blankets, wall and floor coverings',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للسجاد والبطاطين واغطية الحوائط والارضيات',
        ],
        [
            'code' => '4759',
            'desc_en' => 'Retail sale in specialized stores of household electrical appliances, furniture, lighting equipment and other household appliances',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للاجهزة الكهربائية المنزلية والاثاث واجخزة الانارة والادوات المنزلية الاخرى',
        ],
        [
            'code' => '4761',
            'desc_en' => 'Retail sale in specialized stores of books, newspapers, and stationery',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للكتب والصحف والادوات المكتبية',
        ],
        [
            'code' => '4762',
            'desc_en' => 'Retail sale in specialized stores of music and video recordings',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للتسجيلاتالموسشيقية والمرئية',
        ],
        [
            'code' => '4763',
            'desc_en' => 'Retail sale in specialized stores of sports equipment',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للادوات الرياضية',
        ],
        [
            'code' => '4764',
            'desc_en' => 'Retail sale in specialized games and toys stores',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للالعاب واللعب',
        ],
        [
            'code' => '4771',
            'desc_en' => 'Retail sale in specialized stores of shoes, clothing and leather products',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للاحذية والملابس والمنتجات الجلدية',
        ],
        [
            'code' => '4772',
            'desc_en' => 'Retail sale in specialized stores of pharmaceutical, medical and pharmaceutical products, ornamental and cosmetic products',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للمنتجات والعقاقير الصيدلانية والطبية وادوات الزينة والمنتجات التجميلية',
        ],
        [
            'code' => '4773',
            'desc_en' => 'Retail sale in specialized stores of other new products',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة للمنتجات الجديدة الاخرى',
        ],
        [
            'code' => '4774',
            'desc_en' => 'Retail sale of used products',
            'desc_ar' => 'البيع بالتجزئة للمنتجات المستعملة',
        ],
        [
            'code' => '4781',
            'desc_en' => 'Retail sale through kiosks and markets of food, soft drinks and tobacco products',
            'desc_ar' => 'البيع بالتجزئة من خلال الاكشاك والاسواق للمواد الغذائية والمشروبات الخفيفة ومنتجات التبغ',
        ],
        [
            'code' => '4782',
            'desc_en' => 'Retail sale through kiosks and markets of clothes, fabrics and shoes',
            'desc_ar' => 'البيع بالتجزئة من خلال الاكشاك والاسواق للملابس والاقمشة والاحذية',
        ],
        [
            'code' => '4789',
            'desc_en' => 'Retail sale via stalls of other products',
            'desc_ar' => 'البيع بالتجزئة من خلال الاكشاك للمنتجات الاخرى',
        ],
        [
            'code' => '4742',
            'desc_en' => 'Retail sale in stores specialized in audio-visual equipment',
            'desc_ar' => 'البيع بالتجزئة بالمتاجر المتخصصة فى الاجهزة السمعية والبصرية',
        ],
        [
            'code' => '4791',
            'desc_en' => 'Retail sale via mail requests or through the Internet',
            'desc_ar' => 'البيع بالتجزئة عبر طلبات البريد او من خلال الانترنت',
        ],
        [
            'code' => '4799',
            'desc_en' => 'Other types of retail sales that do not take place in stores, kiosks or markets',
            'desc_ar' => 'انواع البيع بالتجزئةالاخرى التى لاتتم بالنتاجر او الاكشاك او الاسواق',
        ],
        [
            'code' => '4911',
            'desc_en' => 'Inland passenger transportation',
            'desc_ar' => 'النقل الداخلى للركاب',
        ],
        [
            'code' => '4912',
            'desc_en' => 'Shipping by rail',
            'desc_ar' => 'الشحن عن طريق السكك الحديدية',
        ],
        [
            'code' => '4921',
            'desc_en' => 'Transporting land passengers outside and inside cities',
            'desc_ar' => 'نقل الركاب البرى خارج وداخل المدن',
        ],
        [
            'code' => '4922',
            'desc_en' => 'Other types of passenger transport by land',
            'desc_ar' => 'انواع نقل الركاب البرية الاخرى',
        ],
        [
            'code' => '4923',
            'desc_en' => 'Land transportation of goods by bus',
            'desc_ar' => 'النقل البرى للبضائع عن طريق الحافلات',
        ],
        [
            'code' => '4930',
            'desc_en' => 'Pipeline transportation',
            'desc_ar' => 'النقل عبر خطوط الانابيب',
        ],
        [
            'code' => '5011',
            'desc_en' => 'Transportation of marine and coastal passengers',
            'desc_ar' => 'نقل الركاب البحرى والساحلى',
        ],
        [
            'code' => '5012',
            'desc_en' => 'Marine and coastal cargo transportation',
            'desc_ar' => 'نقل البضائع البحرى والساحلى',
        ],
        [
            'code' => '5021',
            'desc_en' => 'Inland passenger water transport',
            'desc_ar' => 'النقل الداخلى المائى للركاب',
        ],
        [
            'code' => '5022',
            'desc_en' => 'Inland water transport of goods',
            'desc_ar' => 'النقل الداخلى المائى للبضائع',
        ],
        [
            'code' => '5110',
            'desc_en' => 'Air transport of passengers',
            'desc_ar' => 'النقل الجوى للركاب',
        ],
        [
            'code' => '5120',
            'desc_en' => 'Air freight transport',
            'desc_ar' => 'النقل الجوى للبضائع',
        ],
        [
            'code' => '5210',
            'desc_en' => 'Keep and store',
            'desc_ar' => 'الاحتفاظ والتخزين',
        ],
        [
            'code' => '5221',
            'desc_en' => 'Service activities related to road transport',
            'desc_ar' => 'انشطة الخدمات المتصلة بالنقل البرى',
        ],
        [
            'code' => '5222',
            'desc_en' => 'Emergency service activities related to maritime transport',
            'desc_ar' => 'انشطة الخدمات الطارئة المتصلة بالنقل البحرى',
        ],
        [
            'code' => '5223',
            'desc_en' => 'Emergency service activities related to air transport',
            'desc_ar' => 'انشطة الخدمات الطارئة المتصلة بالنقل الجوى',
        ],
        [
            'code' => '5224',
            'desc_en' => 'Cargo handling',
            'desc_ar' => 'مناولة البضائع',
        ],
        [
            'code' => '5229',
            'desc_en' => 'Other activities in support of the transfer',
            'desc_ar' => 'الانشطة الاخرى الداعمة للنقل',
        ],
        [
            'code' => '5310',
            'desc_en' => 'Mail activities',
            'desc_ar' => 'انشطة البريد',
        ],
        [
            'code' => '5320',
            'desc_en' => 'Parcel delivery activities',
            'desc_ar' => 'انشطة تسليم الطرود',
        ],
        [
            'code' => '5510',
            'desc_en' => 'Short-term placement activities (rental - housing',
            'desc_ar' => 'انشطة التسكين قصيرة المدة',
        ],
        [
            'code' => '5520',
            'desc_en' => 'Campgrounds, parking lots, and locomotives',
            'desc_ar' => 'اراضى المخيمات ومواقف مركبات التنزهة والقاطرات',
        ],
        [
            'code' => '5590',
            'desc_en' => 'Other types of placement',
            'desc_ar' => 'انواع التسكين الاخرى',
        ],
        [
            'code' => '5610',
            'desc_en' => 'Restaurant service and food delivery activities by mobile means',
            'desc_ar' => 'انشطة خدمات المطاعم وتوصيل الطعام بالوسائل المتحركة',
        ],
        [
            'code' => '5621',
            'desc_en' => 'Event catering',
            'desc_ar' => 'تقديم الطعام بالمناسبات',
        ],
        [
            'code' => '5629',
            'desc_en' => 'Other catering services activities',
            'desc_ar' => 'انشطة خدمات تقديم الطعام الاخرى',
        ],
        [
            'code' => '5630',
            'desc_en' => 'Light beverage service activities',
            'desc_ar' => 'انشطة خدمات تقديم المشروبات الخفيفة',
        ],
        [
            'code' => '5811',
            'desc_en' => 'Publishing books',
            'desc_ar' => 'نشر الكتب',
        ],
        [
            'code' => '5812',
            'desc_en' => 'Publish the directory and address lists',
            'desc_ar' => 'نشر الدليل وقوائم العناوين',
        ],
        [
            'code' => '5813',
            'desc_en' => 'Publishing newspapers, magazines and periodicals',
            'desc_ar' => 'نشر الصحف والمجلات والدوريات',
        ],
        [
            'code' => '5819',
            'desc_en' => 'Other publishing activities',
            'desc_ar' => 'انشطة النشر الاخرى',
        ],
        [
            'code' => '5820',
            'desc_en' => 'Computer Software Publishing',
            'desc_ar' => 'نشر برامج الحاسب الالى',
        ],
        [
            'code' => '5911',
            'desc_en' => 'Film, video and television program production activities',
            'desc_ar' => 'انشطة انتاج الافلام السينمائية والفيديو وبرامج التليفزيون',
        ],
        [
            'code' => '5912',
            'desc_en' => 'Subsequent activities for the production of movies, videos and television programs',
            'desc_ar' => 'الانشطة الاحقة لانتاج الافلام السينمائية والفيديو وبرامج التليفزيون',
        ],
        [
            'code' => '5913',
            'desc_en' => 'Motion picture, video and television program distribution activities',
            'desc_ar' => 'انشطة توزيع الافلام السينمائية والفيديو وبرامج التليفزيون',
        ],
        [
            'code' => '5914',
            'desc_en' => 'Film screening activities',
            'desc_ar' => 'انشطة عرض الافلام السينمائية',
        ],
        [
            'code' => '5920',
            'desc_en' => 'Production and publishing of sound and music recordings',
            'desc_ar' => 'انشطة انتاج ونشر التسجيلات الصوتية والموسيقية',
        ],
        [
            'code' => '6010',
            'desc_en' => 'Broadcasting over radio stations',
            'desc_ar' => 'البث عبر محطات الراديو',
        ],
        [
            'code' => '6020',
            'desc_en' => 'Television program preparation and broadcast activities',
            'desc_ar' => 'انشطة اعداد برامج التليفزيون وبثها',
        ],
        [
            'code' => '6110',
            'desc_en' => 'Wired telecommunications activities',
            'desc_ar' => 'انشطة الاتصالات السلكية',
        ],
        [
            'code' => '6120',
            'desc_en' => 'Wireless communication activities',
            'desc_ar' => 'انشطة الاتصالات اللاسلكية',
        ],
        [
            'code' => '6130',
            'desc_en' => 'Satellite communication activities',
            'desc_ar' => 'انشطة الاتصالات عبر الاقمار الصناعية',
        ],
        [
            'code' => '6190',
            'desc_en' => 'Other telecommunications activities',
            'desc_ar' => 'انشطة الاتصالات السلكية و اللاسلكية الاخرى',
        ],
        [
            'code' => '6201',
            'desc_en' => 'Computer program preparation activities',
            'desc_ar' => 'انشطة اعداد برامج الحاسب الالى',
        ],
        [
            'code' => '6202',
            'desc_en' => 'Computer consultancy experience and facilities management activities related to computer fields',
            'desc_ar' => 'الخبرة الاستشارية فى مجال الحاسب الالى وانشطة ادارة التسهيلات المتصلة بمجالات الحاسب الالى',
        ],
        [
            'code' => '6209',
            'desc_en' => 'Other activities related to information technology and computer services',
            'desc_ar' => 'الانشطة الاخرى المتصلة بتكنولوجيا المعلومات وخدمات الحاسب الالى',
        ],
        [
            'code' => '6311',
            'desc_en' => 'Data processing, hosting and related activities',
            'desc_ar' => 'معالجة البيانات والاستضافة والانشطة المتصلة بذلك',
        ],
        [
            'code' => '6312',
            'desc_en' => 'Electronic portals',
            'desc_ar' => 'البوابات الاليكترونية',
        ],
        [
            'code' => '6391',
            'desc_en' => 'Activities of press agencies',
            'desc_ar' => 'انشطة الوكالات الصحفية',
        ],
        [
            'code' => '6399',
            'desc_en' => 'Other activities for information services that are not classified in other locations',
            'desc_ar' => 'الانشطة الاخرى لخدمات تقديم المعلومات غير المصنفة فى مواقع اخرى',
        ],
        [
            'code' => '6411',
            'desc_en' => 'Central banks',
            'desc_ar' => 'المصارف المركزية',
        ],
        [
            'code' => '6419',
            'desc_en' => 'Other financial intermediaries',
            'desc_ar' => 'الوساطات المالية الاخرى',
        ],
        [
            'code' => '6420',
            'desc_en' => 'Activities of holding companies',
            'desc_ar' => 'انشطة الشركات القابضة',
        ],
        [
            'code' => '6430',
            'desc_en' => 'Credit activities, provision of credits, and similar financial entities',
            'desc_ar' => 'انشطةالائتمان وتوفير الاعتمادات والكيانات المالية المشابهة',
        ],
        [
            'code' => '6491',
            'desc_en' => 'Financial leasing',
            'desc_ar' => 'التاجير المالى',
        ],
        [
            'code' => '6492',
            'desc_en' => 'Other forms of loans granted',
            'desc_ar' => 'اشكال القروض الممنوحة الاخرى',
        ],
        [
            'code' => '6499',
            'desc_en' => 'Other financial services activities, with the exception of insurance and credit provision activities for pensions not classified in other locations',
            'desc_ar' => 'انشطة الخدمات المالية الاخرى , باستثناء التامين وانشطة توفير الاعتمادات للمعاشات التقاعدية غير المصنفة فى مواقع اخرى',
        ],
        [
            'code' => '6511',
            'desc_en' => 'life insurance',
            'desc_ar' => 'التامين على الحياة',
        ],
        [
            'code' => '6512',
            'desc_en' => 'Non-life insurance',
            'desc_ar' => 'التامين على غير الحياة',
        ],
        [
            'code' => '6520',
            'desc_en' => 're Insurance',
            'desc_ar' => 'اعادة التامين',
        ],
        [
            'code' => '6530',
            'desc_en' => 'Providing credits for pensions',
            'desc_ar' => 'توفير الاعتمادات للمعاشات التقاعدية',
        ],
        [
            'code' => '6611',
            'desc_en' => 'Financial markets management',
            'desc_ar' => 'ادارة الاسواق المالية',
        ],
        [
            'code' => '6612',
            'desc_en' => 'Security and commodity contracts brokerage',
            'desc_ar' => 'الامن وسمسرة عقود السلع',
        ],
        [
            'code' => '6619',
            'desc_en' => 'Auxiliary activities for financial services',
            'desc_ar' => 'الانشطة المساعدة للخدمات المالية',
        ],
        [
            'code' => '6621',
            'desc_en' => 'Risk and damage assessment',
            'desc_ar' => 'تقدير المخاطر والتلفيات',
        ],
        [
            'code' => '6622',
            'desc_en' => 'Activities of insurance and brokerage agents',
            'desc_ar' => 'انشطة وكلاء التامين والسمسرة',
        ],
        [
            'code' => '6629',
            'desc_en' => 'Other activities auxiliary to insurance and provision for pensions',
            'desc_ar' => 'الانشطة الاخرى المساعدة للتامين وتوفير الاعتمادات للمعاشات التقاعدية',
        ],
        [
            'code' => '6630',
            'desc_en' => 'Financial credit management activities',
            'desc_ar' => 'انشطة ادارة الاعتمادات المالية',
        ],
        [
            'code' => '6810',
            'desc_en' => 'Real estate activities with own or leased property',
            'desc_ar' => 'الانشطة العقارية فى الممتلكات المملوكة او المؤجرة',
        ],
        [
            'code' => '6820',
            'desc_en' => 'Real estate activities on the basis of a contract or a fee',
            'desc_ar' => 'الانشطة العقارية على اساس عقد او نظير رسم',
        ],
        [
            'code' => '6910',
            'desc_en' => 'Legal activities',
            'desc_ar' => 'الانشطة القانونية',
        ],
        [
            'code' => '6920',
            'desc_en' => 'Accounting, auditing, bookkeeping and tax advice activities',
            'desc_ar' => 'الانشطة المحاسبية والمراجعة ومسك الدفاتر والاستشارات الضرائبية',
        ],
        [
            'code' => '7010',
            'desc_en' => 'The main office activities',
            'desc_ar' => 'انشطة المكاتب الرئيسية',
        ],
        [
            'code' => '7020',
            'desc_en' => 'Management consultancy activities',
            'desc_ar' => 'الانشطة الاستشارية الخاصة بالادارة',
        ],
        [
            'code' => '7110',
            'desc_en' => 'Architectural and engineering activities and related technical consulting',
            'desc_ar' => 'الانشطة المعمارية والهندسية و الاستشارات الفنية المتصلة بذلك',
        ],
        [
            'code' => '7120',
            'desc_en' => 'Technical tests and analyzes',
            'desc_ar' => 'الاختبارات والتحليلات الفنية',
        ],
        [
            'code' => '7210',
            'desc_en' => 'Research and experimental development in the field of natural and engineering sciences',
            'desc_ar' => 'البحث والتطوير التجريبى فى مجال العلوم الطبيعية والهندسية',
        ],
        [
            'code' => '7220',
            'desc_en' => 'Experimental research and development in the field of social and human sciences',
            'desc_ar' => 'البحث والتطوير التجريبى فى مجال العلوم الاجتماعية والانسانية',
        ],
        [
            'code' => '7310',
            'desc_en' => 'Advertising',
            'desc_ar' => 'الاعلان',
        ],
        [
            'code' => '7320',
            'desc_en' => 'Market studies and public opinion polls',
            'desc_ar' => 'دراسات السوق واستطلاعات الراى العام',
        ],
        [
            'code' => '7410',
            'desc_en' => 'Specialized design activities',
            'desc_ar' => 'انشطة التصميمات المتخصصة',
        ],
        [
            'code' => '7420',
            'desc_en' => 'Photographic activities',
            'desc_ar' => 'الانشطة الفوتوغرافية',
        ],
        [
            'code' => '7490',
            'desc_en' => 'Other specialized, scientific and artistic activities not classified elsewhere',
            'desc_ar' => 'الانشطة الاخرى التخصصية والعلمية والفنية غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '7500',
            'desc_en' => 'Veterinary activities',
            'desc_ar' => 'الانشطة البيطرية',
        ],
        [
            'code' => '7710',
            'desc_en' => 'Renting motor vehicles',
            'desc_ar' => 'تاجيرواستئجار المركبات ذات المحركات',
        ],
        [
            'code' => '7721',
            'desc_en' => 'Renting and renting sports and leisure products and tools',
            'desc_ar' => 'تاجير واستئجار منتجات والادوات الرياضية والترفيهية',
        ],
        [
            'code' => '7722',
            'desc_en' => 'Rental of video tapes and CDs',
            'desc_ar' => 'تاجير شرائط واسطوانات الفيديو',
        ],
        [
            'code' => '7729',
            'desc_en' => 'Renting and renting other personal and household products',
            'desc_ar' => 'تاجيرواستئجار المنتجات الشخصية والمنزلية الاخرى',
        ],
        [
            'code' => '7730',
            'desc_en' => 'Renting and leasing of other physical devices and equipment',
            'desc_ar' => 'تاجير واستئجار الاجهزة والمعدات المادية الاخرى',
        ],
        [
            'code' => '7740',
            'desc_en' => 'Rent forms of intellectual property and similar products, except for copyright works',
            'desc_ar' => 'استئجار اشكال الملكية الفكرية والمنتجات المشابهة باستثناء اعمال حقوق المؤلف',
        ],
        [
            'code' => '7810',
            'desc_en' => 'Activities of recruitment and appointment agencies',
            'desc_ar' => 'انشطة وكالات التوظيف والتعيين',
        ],
        [
            'code' => '7820',
            'desc_en' => 'Activities of temporary employment agencies',
            'desc_ar' => 'انشطة وكالات التوظيف المؤقت',
        ],
        [
            'code' => '7830',
            'desc_en' => 'Providing other human resources',
            'desc_ar' => 'توفير المصادر البشرية الاخرى',
        ],
        [
            'code' => '7911',
            'desc_en' => 'Tourism agency services',
            'desc_ar' => 'خدمات وكالات السياحة',
        ],
        [
            'code' => '7912',
            'desc_en' => 'Activities of tour guides',
            'desc_ar' => 'انشطة المرشدين السياحيين',
        ],
        [
            'code' => '7990',
            'desc_en' => 'Other types of reservations and related activities',
            'desc_ar' => 'انواع الحجوزات الاخرى والانشط المتصلة بذلك',
        ],
        [
            'code' => '8010',
            'desc_en' => 'Private security activities',
            'desc_ar' => 'انشطة الامن الخاص',
        ],
        [
            'code' => '8020',
            'desc_en' => 'Security systems services activities',
            'desc_ar' => 'انشطة خدمات انظمة الامن',
        ],
        [
            'code' => '8030',
            'desc_en' => 'Investigation activities',
            'desc_ar' => 'انشطة التحرى',
        ],
        [
            'code' => '8110',
            'desc_en' => 'Support activities for joint facilities',
            'desc_ar' => 'انشطة دعم التسهيلات المشتركة',
        ],
        [
            'code' => '8121',
            'desc_en' => 'General cleaning of buildings',
            'desc_ar' => 'النظافة العامة للمبانى',
        ],
        [
            'code' => '8129',
            'desc_en' => 'Building cleaning activities and other industrial facilities',
            'desc_ar' => 'انشطة تنظيف المبانى والمنشات الصناعية الاخرى',
        ],
        [
            'code' => '8130',
            'desc_en' => 'Gardening services and maintenance activities',
            'desc_ar' => 'انشطة خدمات رعاية وصيانة الحدائق',
        ],
        [
            'code' => '8211',
            'desc_en' => 'Joint office support services activities',
            'desc_ar' => 'انشطة خدمات الدعم المكتبية المشتركة',
        ],
        [
            'code' => '8219',
            'desc_en' => 'Photocopying, document processing and other specialized office support services activities',
            'desc_ar' => 'النسخ وتجهيز المستندات وانشطة خدمات الدعم المكتبية المتخصصة الاخرى',
        ],
        [
            'code' => '8220',
            'desc_en' => 'Information center services',
            'desc_ar' => 'خدمات مراكز الاستعلامات',
        ],
        [
            'code' => '8230',
            'desc_en' => 'Organizing trade conferences and exhibitions',
            'desc_ar' => 'تنظيم المؤتمرات والمعارض التجارية',
        ],
        [
            'code' => '8291',
            'desc_en' => 'Activities of collection agencies and lending offices',
            'desc_ar' => 'انشطة وكالات التحصيل ومكاتب الاقراض',
        ],
        [
            'code' => '8292',
            'desc_en' => 'Packaging activities',
            'desc_ar' => 'انشطة التغليف',
        ],
        [
            'code' => '8299',
            'desc_en' => 'Other support services activities that are not classified in other locations',
            'desc_ar' => 'انشطة خدمات الدعم الاخرى الخاصة بالاعمال التجارية غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '8411',
            'desc_en' => 'Public administration activities',
            'desc_ar' => 'انشطة الادارات العامة',
        ],
        [
            'code' => '8412',
            'desc_en' => 'Organizing activities to provide health care, education, educational services and other social services, with the exception of social security',
            'desc_ar' => 'تنظيم انشطة تقديم العناية الصحية والتعليم والخدمات التثقيفية والخدمات الاجتماعية الاخرى باستثناء الضمان الاجتماعى',
        ],
        [
            'code' => '8413',
            'desc_en' => 'Organize and contribute to effective business operations',
            'desc_ar' => 'تنظيم والمساهمة فى عمليات الاعمال التجارية الفعالة',
        ],
        [
            'code' => '8421',
            'desc_en' => 'Foreign affairs',
            'desc_ar' => 'الشئون الخارجية',
        ],
        [
            'code' => '8422',
            'desc_en' => 'Defense activities',
            'desc_ar' => 'انشطة الدفاع',
        ],
        [
            'code' => '8423',
            'desc_en' => 'Security and public order activities',
            'desc_ar' => 'انشطة الامن والنظام العام',
        ],
        [
            'code' => '8430',
            'desc_en' => 'Compulsory social insurance activities',
            'desc_ar' => 'انشطة التامين الاجتماعى الاجبارى',
        ],
        [
            'code' => '8510',
            'desc_en' => 'Primary and pre-primary education',
            'desc_ar' => 'التعليم الابتدائى وقبل الابتدائى',
        ],
        [
            'code' => '8521',
            'desc_en' => 'General secondary education',
            'desc_ar' => 'التعليم الثانوى العام',
        ],
        [
            'code' => '8522',
            'desc_en' => 'Technical and vocational secondary education',
            'desc_ar' => 'التعليم الثانوى الفنى والهنى',
        ],
        [
            'code' => '8530',
            'desc_en' => 'Higher Education',
            'desc_ar' => 'التعليم العالى',
        ],
        [
            'code' => '8541',
            'desc_en' => 'Sports and rehabilitation education',
            'desc_ar' => 'التعليم الرياضى والتاهيلى',
        ],
        [
            'code' => '8542',
            'desc_en' => 'Cultural education',
            'desc_ar' => 'التعليم الثقافى',
        ],
        [
            'code' => '8549',
            'desc_en' => 'Other types of education not classified elsewhere',
            'desc_ar' => 'انواع التعليم الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '8550',
            'desc_en' => 'Activities in support of education',
            'desc_ar' => 'الانشطة الداعمة للتعليم',
        ],
        [
            'code' => '8610',
            'desc_en' => 'Hospital activities',
            'desc_ar' => 'انشطة المستشفيات',
        ],
        [
            'code' => '8620',
            'desc_en' => 'Activities related to medicine and dentistry',
            'desc_ar' => 'الانشطة المتصلة بالطب وطب الاسنان',
        ],
        [
            'code' => '8690',
            'desc_en' => 'Other activities related to human health',
            'desc_ar' => 'الانشطة الاخرى المتصلة بصحة الانسان',
        ],
        [
            'code' => '8710',
            'desc_en' => 'Nursing facilities for sanatoriums',
            'desc_ar' => 'تسهيلات العناية بالتمريض بالمصحات',
        ],
        [
            'code' => '8720',
            'desc_en' => 'Nursing care facilities for special needs clinics, mental illnesses and physical abuse',
            'desc_ar' => 'تسهيلات العناية بالتمريض بالمصحات الخاصة بذوى الاحتياجات الخاصة والامراض العقلية والانتهاكات البدنية',
        ],
        [
            'code' => '8730',
            'desc_en' => 'Spa facilities for the elderly and disabled',
            'desc_ar' => 'تسهيلات العناية بالمصحات الخاصة بالعجائز والمقعدين',
        ],
        [
            'code' => '8790',
            'desc_en' => 'Other spa care facilities',
            'desc_ar' => 'تسهيلات العناية الاخرى بالمصحات',
        ],
        [
            'code' => '8810',
            'desc_en' => 'Social work activities for the infirm and disabled that take place without accommodation',
            'desc_ar' => 'انشطة الاعمال الاجتماعية للعجزة والمقعدين التى تتم بدون اقامة',
        ],
        [
            'code' => '8890',
            'desc_en' => 'Other social business activities that take place without residence',
            'desc_ar' => 'انشطة الاعمال الاجتماعية الاخرى التى تتم بدون اقامة',
        ],
        [
            'code' => '9000',
            'desc_en' => 'Creative and recreational art activities',
            'desc_ar' => 'انشطة الفن الابداعى والترفية',
        ],
        [
            'code' => '9101',
            'desc_en' => 'Library and archive activities',
            'desc_ar' => 'انشطة المكتبات والارشيف',
        ],
        [
            'code' => '9102',
            'desc_en' => 'Museum activities and restoration of historic sites and buildings',
            'desc_ar' => 'انشطة المتاحف وعمليات ترميم المواقع والمبانى التاريخية',
        ],
        [
            'code' => '9103',
            'desc_en' => 'Botanical and zoological gardens and natural wildlife activities',
            'desc_ar' => 'حدائق النباتات والحيوانات وانشطة الحياة البرية الطبيعية',
        ],
        [
            'code' => '9200',
            'desc_en' => 'Betting activities and gambling',
            'desc_ar' => 'انشطة المراهنات والعاب القمار',
        ],
        [
            'code' => '9311',
            'desc_en' => 'Providing sports facilities',
            'desc_ar' => 'توفير التسهيلات الرياضية',
        ],
        [
            'code' => '9312',
            'desc_en' => 'Sports club activities',
            'desc_ar' => 'انشطة النوادى الرياضية',
        ],
        [
            'code' => '9319',
            'desc_en' => 'Other sports activities',
            'desc_ar' => 'الانشطة الرياضية الاخرى',
        ],
        [
            'code' => '9321',
            'desc_en' => 'Recreational activities and performances in parks',
            'desc_ar' => 'الانشطة الترفيهية والعروض التى تتم بالمتنزهات',
        ],
        [
            'code' => '9329',
            'desc_en' => 'Other leisure and entertainment activities not classified elsewhere',
            'desc_ar' => 'الانشطة الترفيهية والمسلية الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '9411',
            'desc_en' => 'The activities of commercial enterprises, employers and professional membership organizations',
            'desc_ar' => 'انشطة المؤسسات التجارية وارباب العمل ومنظمات العضوية المهنية',
        ],
        [
            'code' => '9412',
            'desc_en' => 'Activities of professional membership organizations',
            'desc_ar' => 'انشطة منظمات العضوية المهنية',
        ],
        [
            'code' => '9420',
            'desc_en' => 'Trade union activities',
            'desc_ar' => 'انشطة النقابات التجارية',
        ],
        [
            'code' => '9491',
            'desc_en' => 'Activities of religious organizations',
            'desc_ar' => 'انشطة المنظمات الدينية',
        ],
        [
            'code' => '9492',
            'desc_en' => 'Activities of political organizations',
            'desc_ar' => 'انشطة المنظمات السياسية',
        ],
        [
            'code' => '9499',
            'desc_en' => 'Activities of other membership organizations not classified elsewhere',
            'desc_ar' => 'انشطة المنظمات الاخرى ذات العضوية غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '9511',
            'desc_en' => 'Computer repair and accessories',
            'desc_ar' => 'اصلاح الحاسبات الالية ومستلزماتها',
        ],
        [
            'code' => '9512',
            'desc_en' => 'Communication equipment repair',
            'desc_ar' => 'اصلاح اجهزة الاتصالات',
        ],
        [
            'code' => '9521',
            'desc_en' => 'Electronic devices repair',
            'desc_ar' => 'اصلاح الاجهزة الاليكترونية',
        ],
        [
            'code' => '9522',
            'desc_en' => 'Repair of tools, household appliances, and garden care equipment',
            'desc_ar' => 'اصلاح الادوات والاجهزة المنزلية ومعدات العناية بالحدائق',
        ],
        [
            'code' => '9523',
            'desc_en' => 'Shoe and leather products repair',
            'desc_ar' => 'اصلاح الاحذية والمنتجات الجلدية',
        ],
        [
            'code' => '9524',
            'desc_en' => 'Repair of furniture and household items',
            'desc_ar' => 'اصلاح الاثاث والمستلزمات المنزلية',
        ],
        [
            'code' => '9529',
            'desc_en' => 'Repair of other household and personal products',
            'desc_ar' => 'اصلاح المنتجات المنزلية والشخصية الاخرى',
        ],
        [
            'code' => '9601',
            'desc_en' => 'Wash and clean textile and fur products',
            'desc_ar' => 'غسيل المنسوجات والمنتجات الفرائية وتنظيفها تنظيفا جافا',
        ],
        [
            'code' => '9602',
            'desc_en' => 'Hair styling and other cosmetics',
            'desc_ar' => 'تصفيف الشعر وانواع التجميل الاخرى',
        ],
        [
            'code' => '9603',
            'desc_en' => 'Funeral and related activities',
            'desc_ar' => 'انشطة الجنائز وما يتصل بها',
        ],
        [
            'code' => '9609',
            'desc_en' => 'Other personal services activities not classified elsewhere',
            'desc_ar' => 'انشطة الخدمات الشخصية الاخرى غير المصنفة فى مواضع اخرى',
        ],
        [
            'code' => '9700',
            'desc_en' => 'Home employment activities',
            'desc_ar' => 'انشطة توظيف العمالة المنزلية',
        ],
        [
            'code' => '9810',
            'desc_en' => 'Activities of producing unearthed products and services for home appliances for personal use',
            'desc_ar' => 'انشطة انتاج المنتجات والخدمات غير المتميزة الخاصة بالاجهزة المنزلية للاستخدام الشخصى',
        ],
        [
            'code' => '9820',
            'desc_en' => 'Activities of producing unearthed products and services for home appliances for personal use',
            'desc_ar' => 'انشطة انتاج المنتجات والخدمات غير المتميزة الخاصة بالاجهزة المنزلية للاستخدام الشخصى',
        ],
        [
            'code' => '9900',
            'desc_en' => 'Activities of non-regional organizations and bodies',
            'desc_ar' => 'انشطة المنظمات والهيئات غير الاقليمية',
        ],
    ];
}
