<?php

namespace App\Domains\ETA\Models;

use App\Domains\ETA\Models\Concerns\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sushi\Sushi;

class TaxTypes extends Model
{
    use Sushi;
    use HasTranslations;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_taxable' => 'bool',
    ];

    /**
     * Get Sushi array record.
     *
     * @var array
     */
    protected array $rows = [
        [
            'code' => 'T1',
            'desc_en' => 'Value added tax',
            'desc_ar' => 'ضريبه القيمه المضافه',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T2',
            'desc_en' => 'Table tax (percentage)',
            'desc_ar' => 'ضريبه الجدول (نسبيه)',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T3',
            'desc_en' => 'Table tax (Fixed Amount)',
            'desc_ar' => 'ضريبه الجدول (قطعيه)',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T4',
            'desc_en' => 'Withholding tax (WHT)',
            'desc_ar' => 'الخصم تحت حساب الضريبه',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T5',
            'desc_en' => 'Stamping tax (percentage)',
            'desc_ar' => 'ضريبه الدمغه (نسبيه)',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T6',
            'desc_en' => 'Stamping Tax (amount)',
            'desc_ar' => 'ضريبه الدمغه (قطعيه بمقدار ثابت )',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T7',
            'desc_en' => 'Entertainment tax',
            'desc_ar' => 'ضريبة الملاهى',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T8',
            'desc_en' => 'Resource development fee',
            'desc_ar' => 'رسم تنميه الموارد',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T9',
            'desc_en' => 'Table tax (percentage)',
            'desc_ar' => 'رسم خدمة',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T10',
            'desc_en' => 'Municipality Fees',
            'desc_ar' => 'رسم المحليات',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T11',
            'desc_en' => 'Medical insurance fee',
            'desc_ar' => 'رسم التامين الصحى',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T12',
            'desc_en' => 'Other fees',
            'desc_ar' => 'رسوم أخري',
            'is_taxable' => true,
            'parent' => null,
        ],
        [
            'code' => 'T13',
            'desc_en' => 'Stamping tax (percentage)',
            'desc_ar' => 'ضريبه الدمغه (نسبيه)',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T14',
            'desc_en' => 'Stamping Tax (amount)',
            'desc_ar' => 'ضريبه الدمغه (قطعيه بمقدار ثابت )',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T15',
            'desc_en' => 'Entertainment tax',
            'desc_ar' => 'ضريبة الملاهى',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T16',
            'desc_en' => 'Resource development fee',
            'desc_ar' => 'رسم تنميه الموارد',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T17',
            'desc_en' => 'Table tax (percentage)',
            'desc_ar' => 'رسم خدمة',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T18',
            'desc_en' => 'Municipality Fees',
            'desc_ar' => 'رسم المحليات',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T19',
            'desc_en' => 'Medical insurance fee',
            'desc_ar' => 'رسم التامين الصحى',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'T20',
            'desc_en' => 'Other fees',
            'desc_ar' => 'رسوم أخرى',
            'is_taxable' => false,
            'parent' => null,
        ],
        [
            'code' => 'V001',
            'desc_en' => 'Export',
            'desc_ar' => 'تصدير للخارج',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V002',
            'desc_en' => 'Export to free areas and other areas',
            'desc_ar' => 'تصدير مناطق حرة وأخرى',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V003',
            'desc_en' => 'Exempted good or service',
            'desc_ar' => 'سلعة أو خدمة معفاة',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V004',
            'desc_en' => 'A non-taxable good or service',
            'desc_ar' => 'سلعة أو خدمة غير خاضعة للضريبة',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V005',
            'desc_en' => 'Exemptions for diplomats, consulates and embassies',
            'desc_ar' => 'إعفاءات دبلوماسين والقنصليات والسفارات',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V006',
            'desc_en' => 'Defence and National security Exemptions',
            'desc_ar' => 'إعفاءات الدفاع والأمن القومى',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V007',
            'desc_en' => 'Agreements exemptions',
            'desc_ar' => 'إعفاءات اتفاقيات',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V008',
            'desc_en' => 'Special Exemptios and other reasons',
            'desc_ar' => 'إعفاءات خاصة و أخرى',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V009',
            'desc_en' => 'General Item sales',
            'desc_ar' => 'سلع عامة',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'V010',
            'desc_en' => 'Other Rates',
            'desc_ar' => 'نسب ضريبة أخرى',
            'parent' => 'T1',
            'isTaxable' => null,
        ],
        [
            'code' => 'Tbl01',
            'desc_en' => 'Table tax (percentage)',
            'desc_ar' => 'ضريبه الجدول (نسبيه)',
            'parent' => 'T2',
            'isTaxable' => null,
        ],
        [
            'code' => 'Tbl02',
            'desc_en' => 'Table tax (Fixed Amount)',
            'desc_ar' => 'ضريبه الجدول (النوعية)',
            'parent' => 'T3',
            'isTaxable' => null,
        ],
        [
            'code' => 'W001',
            'desc_en' => 'Contracting',
            'desc_ar' => 'المقاولات',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W002',
            'desc_en' => 'Supplies',
            'desc_ar' => 'التوريدات',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W003',
            'desc_en' => 'Purachases',
            'desc_ar' => 'المشتريات',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W004',
            'desc_en' => 'Services',
            'desc_ar' => 'الخدمات',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W005',
            'desc_en' => 'Sumspaid by the cooperative societies for car transportation to their members',
            'desc_ar' => 'المبالغالتي تدفعها الجميعات التعاونية للنقل بالسيارات لاعضائها',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W006',
            'desc_en' => 'Commissionagency & brokerage',
            'desc_ar' => 'الوكالةبالعمولة والسمسرة',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W007',
            'desc_en' => 'Discounts& grants & additional exceptional incentives granted by smoke &cement companies',
            'desc_ar' => 'الخصوماتوالمنح والحوافز الاستثنائية ةالاضافية التي تمنحها شركات الدخان والاسمنت ',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W008',
            'desc_en' => 'Alldiscounts & grants & commissions granted by petroleum &telecommunications & other companies',
            'desc_ar' => 'جميعالخصومات والمنح والعمولات  التيتمنحها  شركات البترول والاتصالات ...وغيرها من الشركات المخاطبة بنظام الخصم',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W009',
            'desc_en' => 'Supporting export subsidies',
            'desc_ar' => 'مساندة دعم الصادرات التي يمنحها صندوق تنمية الصادرات ',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W010',
            'desc_en' => 'Professional fees',
            'desc_ar' => 'اتعاب مهنية',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W011',
            'desc_en' => 'Commission & brokerage _A_57',
            'desc_ar' => 'العمولة والسمسرة _م_57',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W012',
            'desc_en' => 'Hospitals collecting from doctors',
            'desc_ar' => 'تحصيل المستشفيات من الاطباء',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W013',
            'desc_en' => 'Royalties',
            'desc_ar' => 'الاتاوات',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W014',
            'desc_en' => 'Customs clearance',
            'desc_ar' => 'تخليص جمركي ',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W015',
            'desc_en' => 'Exemption',
            'desc_ar' => 'أعفاء',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'W016',
            'desc_en' => 'advance payments',
            'desc_ar' => 'دفعات مقدمه',
            'parent' => 'T4',
            'isTaxable' => null,
        ],
        [
            'code' => 'ST01',
            'desc_en' => 'Stamping tax (percentage)',
            'desc_ar' => 'ضريبه الدمغه (نسبيه)',
            'parent' => 'T5',
            'isTaxable' => null,
        ],
        [
            'code' => 'ST02',
            'desc_en' => 'Stamping Tax (amount)',
            'desc_ar' => 'ضريبه الدمغه (قطعيه بمقدار ثابت)',
            'parent' => 'T6',
            'isTaxable' => null,
        ],
        [
            'code' => 'Ent01',
            'desc_en' => 'Entertainment tax (rate)',
            'desc_ar' => 'ضريبة الملاهى (نسبة)',
            'parent' => 'T7',
            'isTaxable' => null,
        ],
        [
            'code' => 'Ent02',
            'desc_en' => 'Entertainment tax (amount)',
            'desc_ar' => 'ضريبة الملاهى (قطعية)',
            'parent' => 'T7',
            'isTaxable' => null,
        ],
        [
            'code' => 'RD01',
            'desc_en' => 'Resource development fee (rate)',
            'desc_ar' => 'رسم تنميه الموارد (نسبة)',
            'parent' => 'T8',
            'isTaxable' => null,
        ],
        [
            'code' => 'RD02',
            'desc_en' => 'Resource development fee (amount)',
            'desc_ar' => 'رسم تنميه الموارد (قطعية)',
            'parent' => 'T8',
            'isTaxable' => null,
        ],
        [
            'code' => 'SC01',
            'desc_en' => 'Service charges (rate)',
            'desc_ar' => 'رسم خدمة (نسبة)',
            'parent' => 'T9',
            'isTaxable' => null,
        ],
        [
            'code' => 'SC02',
            'desc_en' => 'Service charges (amount)',
            'desc_ar' => 'رسم خدمة (قطعية)',
            'parent' => 'T9',
            'isTaxable' => null,
        ],
        [
            'code' => 'Mn01',
            'desc_en' => 'Municipality Fees (rate)',
            'desc_ar' => 'رسم المحليات (نسبة)',
            'parent' => 'T10',
            'isTaxable' => null,
        ],
        [
            'code' => 'Mn02',
            'desc_en' => 'Municipality Fees (amount)',
            'desc_ar' => 'رسم المحليات (قطعية)',
            'parent' => 'T10',
            'isTaxable' => null,
        ],
        [
            'code' => 'MI01',
            'desc_en' => 'Medical insurance fee (rate)',
            'desc_ar' => 'رسم التامين الصحى (نسبة)',
            'parent' => 'T11',
            'isTaxable' => null,
        ],
        [
            'code' => 'MI02',
            'desc_en' => 'Medical insurance fee (amount)',
            'desc_ar' => 'رسم التامين الصحى (قطعية)',
            'parent' => 'T11',
            'isTaxable' => null,
        ],
        [
            'code' => 'OF01',
            'desc_en' => 'Other fees (rate)',
            'desc_ar' => 'رسوم أخرى (نسبة)',
            'parent' => 'T12',
            'isTaxable' => null,
        ],
        [
            'code' => 'OF02',
            'desc_en' => 'Other fees (amount)',
            'desc_ar' => 'رسوم أخرى (قطعية)',
            'parent' => 'T12',
            'isTaxable' => null,
        ],
        [
            'code' => 'ST03',
            'desc_en' => 'Stamping tax (percentage)',
            'desc_ar' => 'ضريبه الدمغه (نسبيه)',
            'parent' => 'T13',
            'isTaxable' => null,
        ],
        [
            'code' => 'ST04',
            'desc_en' => 'Stamping Tax (amount)',
            'desc_ar' => 'ضريبه الدمغه (قطعيه بمقدار ثابت)',
            'parent' => 'T14',
            'isTaxable' => null,
        ],
        [
            'code' => 'Ent03',
            'desc_en' => 'Entertainment tax (rate)',
            'desc_ar' => 'ضريبة الملاهى (نسبة)',
            'parent' => 'T15',
            'isTaxable' => null,
        ],
        [
            'code' => 'Ent04',
            'desc_en' => 'Entertainment tax (amount)',
            'desc_ar' => 'ضريبة الملاهى (قطعية)',
            'parent' => 'T15',
            'isTaxable' => null,
        ],
        [
            'code' => 'RD03',
            'desc_en' => 'Resource development fee (rate)',
            'desc_ar' => 'رسم تنميه الموارد (نسبة)',
            'parent' => 'T16',
            'isTaxable' => null,
        ],
        [
            'code' => 'RD04',
            'desc_en' => 'Resource development fee (amount)',
            'desc_ar' => 'رسم تنميه الموارد (قطعية)',
            'parent' => 'T16',
            'isTaxable' => null,
        ],
        [
            'code' => 'SC03',
            'desc_en' => 'Service charges (rate)',
            'desc_ar' => 'رسم خدمة (نسبة)',
            'parent' => 'T17',
            'isTaxable' => null,
        ],
        [
            'code' => 'SC04',
            'desc_en' => 'Service charges (amount)',
            'desc_ar' => 'رسم خدمة (قطعية)',
            'parent' => 'T17',
            'isTaxable' => null,
        ],
        [
            'code' => 'Mn03',
            'desc_en' => 'Municipality Fees (rate)',
            'desc_ar' => 'رسم المحليات (نسبة)',
            'parent' => 'T18',
            'isTaxable' => null,
        ],
        [
            'code' => 'Mn04',
            'desc_en' => 'Municipality Fees (amount)',
            'desc_ar' => 'رسم المحليات (قطعية)',
            'parent' => 'T18',
            'isTaxable' => null,
        ],
        [
            'code' => 'MI03',
            'desc_en' => 'Medical insurance fee (rate)',
            'desc_ar' => 'رسم التامين الصحى (نسبة)',
            'parent' => 'T19',
            'isTaxable' => null,
        ],
        [
            'code' => 'MI04',
            'desc_en' => 'Medical insurance fee (amount)',
            'desc_ar' => 'رسم التامين الصحى (قطعية)',
            'parent' => 'T19',
            'isTaxable' => null,
        ],
        [
            'code' => 'OF03',
            'desc_en' => 'Other fees (rate)',
            'desc_ar' => 'رسوم أخرى (نسبة)',
            'parent' => 'T20',
            'isTaxable' => null,
        ],
        [
            'code' => 'OF04',
            'desc_en' => 'Other fees (amount)',
            'desc_ar' => 'رسوم أخرى (قطعية)',
            'parent' => 'T20',
            'isTaxable' => null,
        ],
    ];

    /**
     * Get parent tax type.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent', 'code');
    }

    /**
     * Determine that the type is taxable.
     *
     * @param  bool|null  $isTaxable
     * @return bool
     */
    public function getIsTaxableAttribute(?bool $isTaxable): bool
    {
        return $isTaxable ?? $this->parent->isTaxable;
    }
}
