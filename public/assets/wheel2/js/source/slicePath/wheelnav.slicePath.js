/* ======================================================================================= */
/* Slice path definitions.                                                                 */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: https://wheelnavjs.softwaretailoring.net/documentation/slicePath.html    */
/* ======================================================================================= */

slicePath = function () {

    this.NullSlice = function (helper, percent, custom) {

        helper.setBaseValue(percent, custom);
        titlePathString = helper.getCurvedTitlePathString();

        return {
            slicePathString: "",
            linePathString: "",
            titlePosX: helper.titlePosX,
            titlePosY: helper.titlePosY,
            titlePathString: titlePathString
        };
    };

    this.NullInitSlice = function (helper, percent, custom) {

        helper.setBaseValue(percent, custom);

        slicePathString = [helper.MoveToCenter(),
                 helper.Close()];
        titlePathString = helper.getCurvedTitlePathString();

        return {
            slicePathString: slicePathString,
            linePathString: slicePathString,
            titlePosX: helper.centerX,
            titlePosY: helper.centerY,
            titlePathString: titlePathString
        };
    };


this.PieSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.arcBaseRadiusPercent = 1;
    custom.arcRadiusPercent = 1;
    custom.startRadiusPercent = 0;
    return custom;
};

this.PieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;
    
    slicePathString = [];
    slicePathString.push(helper.MoveTo(helper.middleAngle, custom.startRadiusPercent * helper.sliceRadius));
    slicePathString.push(helper.LineTo(helper.startAngle, arcBaseRadius));
    if (helper.sliceAngle > 180) {
        slicePathString.push(helper.ArcTo(arcRadius, helper.middleAngle, arcBaseRadius));
    }
    slicePathString.push(helper.ArcTo(arcRadius, helper.endAngle, arcBaseRadius));
    slicePathString.push(helper.Close());

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.FlowerSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieSliceCustomization();
        custom.titleRadiusPercent = 0.5;
        custom.arcBaseRadiusPercent = 0.65;
        custom.arcRadiusPercent = 0.14;
    }

    var slicePath = PieSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};


this.PieArrowSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.arrowRadiusPercent = 1.1;

    return custom;
};

this.PieArrowSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieArrowSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;
    
    arrowAngleStart = helper.startAngle + helper.sliceAngle * 0.45;
    arrowAngleEnd = helper.startAngle + helper.sliceAngle * 0.55;

    var arrowRadius = r * custom.arrowRadiusPercent;

    slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.ArcTo(r, arrowAngleStart, r),
                 helper.LineTo(helper.middleAngle, arrowRadius),
                 helper.LineTo(arrowAngleEnd, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.PieArrowBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieArrowSliceCustomization();
    }

    custom.arrowRadiusPercent = 1;
    var slicePath = PieArrowSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};


this.DonutSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.minRadiusPercent = 0.37;
    custom.maxRadiusPercent = 0.9;

    return custom;
};

this.DonutSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = DonutSliceCustomization();
    }

    maxRadius = helper.wheelRadius * percent * custom.maxRadiusPercent;
    minRadius = helper.wheelRadius * percent * custom.minRadiusPercent;

    helper.setBaseValue(percent, custom);

    helper.titleRadius = (maxRadius + minRadius) / 2;
    helper.setTitlePos();

    slicePathString = [helper.MoveTo(helper.startAngle, minRadius),
                 helper.LineTo(helper.startAngle, maxRadius),
                 helper.ArcTo(maxRadius, helper.middleAngle, maxRadius),
                 helper.ArcTo(maxRadius, helper.endAngle, maxRadius),
                 helper.LineTo(helper.endAngle, minRadius),
                 helper.ArcBackTo(minRadius, helper.middleAngle, minRadius),
                 helper.ArcBackTo(minRadius, helper.startAngle, minRadius),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.CogSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.55;
    custom.isBasePieSlice = false;

    return custom;
};

this.CogSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = CogSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;
    rbase = helper.wheelRadius * percent * 0.83;

    percentAngle0625 = helper.startAngle + helper.sliceAngle * 0.0625;
    percentAngle1250 = helper.startAngle + helper.sliceAngle * 0.125;
    percentAngle1875 = helper.startAngle + helper.sliceAngle * 0.1875;
    percentAngle2500 = helper.startAngle + helper.sliceAngle * 0.25;
    percentAngle3125 = helper.startAngle + helper.sliceAngle * 0.3125;
    percentAngle3750 = helper.startAngle + helper.sliceAngle * 0.375;
    percentAngle4375 = helper.startAngle + helper.sliceAngle * 0.4375;
    percentAngle5000 = helper.startAngle + helper.sliceAngle * 0.5;
    percentAngle5625 = helper.startAngle + helper.sliceAngle * 0.5625;
    percentAngle6250 = helper.startAngle + helper.sliceAngle * 0.625;
    percentAngle6875 = helper.startAngle + helper.sliceAngle * 0.6875;
    percentAngle7500 = helper.startAngle + helper.sliceAngle * 0.75;
    percentAngle8125 = helper.startAngle + helper.sliceAngle * 0.8125;
    percentAngle8750 = helper.startAngle + helper.sliceAngle * 0.875;
    percentAngle9375 = helper.startAngle + helper.sliceAngle * 0.9375;
    percentAngle9687 = helper.startAngle + helper.sliceAngle * 0.96875;

    if (custom.isBasePieSlice) {
        r = rbase;
        slicePathString = [helper.MoveToCenter(),
            helper.LineTo(helper.startAngle, r),
            helper.ArcTo(r, percentAngle0625, r),
            helper.ArcTo(r, percentAngle1250, r),
            helper.ArcTo(r, percentAngle1875, r),
            helper.ArcTo(r, percentAngle2500, r),
            helper.ArcTo(r, percentAngle3125, r),
            helper.ArcTo(r, percentAngle3750, r),
            helper.ArcTo(r, percentAngle4375, r),
            helper.ArcTo(r, percentAngle5000, r),
            helper.ArcTo(r, percentAngle5625, r),
            helper.ArcTo(r, percentAngle6250, r),
            helper.ArcTo(r, percentAngle6875, r),
            helper.ArcTo(r, percentAngle7500, r),
            helper.ArcTo(r, percentAngle8125, r),
            helper.ArcTo(r, percentAngle8750, r),
            helper.ArcTo(r, percentAngle9375, r),
            helper.ArcTo(r, percentAngle9687, r),
            helper.ArcTo(r, helper.endAngle, r),
            helper.Close()];
    }
    else {
        slicePathString = [helper.MoveToCenter(),
            helper.LineTo(helper.startAngle, r),
            helper.ArcTo(r, percentAngle0625, r),
            helper.LineTo(percentAngle0625, rbase),
            helper.ArcTo(rbase, percentAngle1875, rbase),
            helper.LineTo(percentAngle1875, r),
            helper.ArcTo(r, percentAngle3125, r),
            helper.LineTo(percentAngle3125, rbase),
            helper.ArcTo(rbase, percentAngle4375, rbase),
            helper.LineTo(percentAngle4375, r),
            helper.ArcTo(r, percentAngle5625, r),
            helper.LineTo(percentAngle5625, rbase),
            helper.ArcTo(rbase, percentAngle6875, rbase),
            helper.LineTo(percentAngle6875, r),
            helper.ArcTo(r, percentAngle8125, r),
            helper.LineTo(percentAngle8125, rbase),
            helper.ArcTo(rbase, percentAngle9375, rbase),
            helper.LineTo(percentAngle9375, r),
            helper.ArcTo(r, helper.endAngle, r),
            helper.Close()];
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.CogBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = CogSliceCustomization();
    }

    custom.isBasePieSlice = true;

    var slicePath = CogSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};


this.StarSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.44;
    custom.minRadiusPercent = 0.5;
    custom.isBasePieSlice = false;

    return custom;
};

this.StarSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = StarSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.wheelRadius * percent;
    rbase = r * custom.minRadiusPercent;

    if (custom.isBasePieSlice) {
        r = helper.sliceRadius;
        slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.Close()];
    }
    else {
        slicePathString = [helper.MoveToCenter(),
                     helper.LineTo(helper.startAngle, rbase),
                     helper.LineTo(helper.middleAngle, r),
                     helper.LineTo(helper.endAngle, rbase),
                     helper.Close()];
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.StarBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = StarSliceCustomization();
    }

    custom.titleRadiusPercent = 0.6;
    custom.isBasePieSlice = true;

    var slicePath = StarSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};


this.MenuSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.menuRadius = 35;
    custom.titleRadiusPercent = 0.63;
    custom.isSelectedLine = false;
    custom.lineBaseRadiusPercent = 0;

    return custom;
};

this.MenuSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = MenuSliceCustomization();
    }

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    var r = helper.wheelRadius * percent;
    helper.titleRadius = r * custom.titleRadiusPercent;
    helper.setTitlePos();

    var menuRadius = percent * custom.menuRadius;

    if (percent <= 0.05) { menuRadius = 10; }

    middleTheta = helper.middleTheta;

    slicePathString = [["M", helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX + (menuRadius * Math.cos(middleTheta)), helper.titlePosY + (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["z"]];

    if (percent <= 0.05) {
        linePathString = [["M", x, y],
                ["A", 1, 1, 0, 0, 1, x + 1, y + 1]];
    }
    else {
        if (!custom.isSelectedLine) {
            linePathString = [helper.MoveTo(helper.middleAngle, custom.lineBaseRadiusPercent * r),
                              helper.ArcTo(r / 2, helper.middleAngle, helper.titleRadius - menuRadius)];
        }
        else {
            linePathString = [helper.MoveTo(helper.middleAngle, custom.lineBaseRadiusPercent * r),
                              helper.ArcTo(r / 3, helper.middleAngle, helper.titleRadius - menuRadius)];
        }
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.MenuSliceSelectedLine = function (helper, percent, custom) {

    if (custom === null) {
        custom = MenuSliceCustomization();
    }

    custom.isSelectedLine = true;

    var slicePath = MenuSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: slicePath.linePathString,
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

this.MenuSliceWithoutLine = function (helper, percent, custom) {

    var slicePath = MenuSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};


this.LineSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    if (helper.sliceAngle > 60 &&
        helper.sliceAngle < 180) {
        helper.titleRadius = r * ((180 / helper.sliceAngle) / 5);
        helper.setTitlePos();
    }
    else {
        helper.titleRadius = r * 0.55;
        helper.setTitlePos();
    }

    if (helper.sliceAngle < 180) {
        slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.LineTo(helper.endAngle, r),
                 helper.Close()];
    }
    else {
        if (helper.startAngle === 180 ||
            helper.startAngle === 0 ||
            helper.startAngle === -180 ||
            helper.startAngle === 360) {
            slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.LineTo(helper.startAngle, r, helper.middleAngle, r),
                 helper.LineTo(helper.endAngle, r, helper.middleAngle, r),
                 helper.LineTo(helper.endAngle, r),
                 helper.Close()];
        }
        else {
            slicePathString = [helper.MoveToCenter(),
             helper.LineTo(helper.startAngle, r),
             helper.LineTo(helper.middleAngle, r, helper.startAngle, r),
             helper.LineTo(helper.middleAngle, r, helper.endAngle, r),
             helper.LineTo(helper.endAngle, r),
             helper.Close()];
        }
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.EyeSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.68;

    return custom;
};

this.EyeSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = EyeSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.wheelRadius * percent * 0.7;

    if (percent === 0) {
        r = 0.01;
    }

    startAngle = helper.startAngle;
    endAngle = helper.endAngle;

    if (helper.sliceAngle === 180) {
        startAngle = helper.startAngle + helper.sliceAngle / 4;
        endAngle = helper.startAngle + helper.sliceAngle - helper.sliceAngle / 4;
    }

    slicePathString = [helper.MoveTo(endAngle, r),
                 helper.ArcTo(r, startAngle, r),
                 helper.ArcTo(r, endAngle, r),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.WheelSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    r = helper.sliceRadius;

    startTheta = helper.startTheta;
    middleTheta = helper.middleTheta;
    endTheta = helper.endTheta;

    var innerRadiusPercent;
    var startendRadiusPercent;

    if (helper.sliceAngle < 120) {
        helper.titleRadius = r * 0.57;
        innerRadiusPercent = 0.9;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.87;
    }
    else if (helper.sliceAngle < 180) {
        helper.titleRadius = r * 0.52;
        innerRadiusPercent = 0.91;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.87;
    }
    else {
        helper.titleRadius = r * 0.45;
        innerRadiusPercent = 0.873;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.94;
    }

    slicePathString = [helper.MoveTo(helper.middleAngle, r * 0.07),
                 ["L", (r * 0.07) * Math.cos(middleTheta) + (r * startendRadiusPercent) * Math.cos(startTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * startendRadiusPercent) * Math.sin(startTheta) + y],
                 ["A", (r * innerRadiusPercent), (r * innerRadiusPercent), 0, 0, 1, (r * 0.07) * Math.cos(middleTheta) + (r * middleRadiusPercent) * Math.cos(middleTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * middleRadiusPercent) * Math.sin(middleTheta) + y],
                 ["A", (r * innerRadiusPercent), (r * innerRadiusPercent), 0, 0, 1, (r * 0.07) * Math.cos(middleTheta) + (r * startendRadiusPercent) * Math.cos(endTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * startendRadiusPercent) * Math.sin(endTheta) + y],
                 helper.Close()];

    linePathString = [helper.MoveTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r, helper.middleAngle, r),
                 helper.ArcBackTo(r, helper.startAngle, r)];

    helper.setTitlePos();

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.OuterStrokeSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    r = helper.sliceRadius;
    innerRadius = r / 4;

    if (helper.sliceAngle < 120) { helper.titleRadius = r * 0.57; }
    else if (helper.sliceAngle < 180) { helper.titleRadius = r * 0.52; }
    else { helper.titleRadius = r * 0.45; }

    linePathString = [helper.MoveTo(helper.startAngle, innerRadius),
                 helper.LineTo(helper.startAngle, r),
                 helper.MoveTo(helper.endAngle, innerRadius),
                 helper.LineTo(helper.endAngle, r)];

    slicePathString = [helper.MoveTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r, helper.middleAngle, r),
                 helper.ArcBackTo(r, helper.startAngle, r),
                 helper.MoveTo(helper.startAngle, innerRadius),
                 helper.ArcTo(innerRadius, helper.middleAngle, innerRadius),
                 helper.ArcTo(innerRadius, helper.endAngle, innerRadius),
                 helper.ArcBackTo(innerRadius, helper.middleAngle, innerRadius),
                 helper.ArcBackTo(innerRadius, helper.startAngle, innerRadius)];

    helper.setTitlePos();

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.TabSlice = function (helper, percent, custom) {

    var rOriginal = helper.wheelRadius * 0.9;
    var navItemCount = 360 / helper.sliceAngle;
    var itemSize = 2 * rOriginal / navItemCount;

    x = helper.centerX;
    y = helper.centerY;
    itemIndex = helper.itemIndex;

    titlePosX = x;
    titlePosY = itemIndex * itemSize + y + (itemSize / 2) - rOriginal;

    slicePathString = [];
    slicePathString.push(helper.MoveToXY(x - (itemSize / 2), itemIndex * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY((itemSize / 2) + x, itemIndex * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY((itemSize / 2) + x, (itemIndex + 1) * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY(x - (itemSize / 2), (itemIndex + 1) * itemSize + y - rOriginal));
    slicePathString.push(helper.Close());

    titlePathString = [];
    titlePathString.push(helper.MoveToXY(x - (itemSize / 2), (itemIndex + 1) * itemSize + y - rOriginal));
    titlePathString.push(helper.ArcToXY(itemSize * 2, (itemSize / 2) + x, itemIndex * itemSize + y - rOriginal));

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: titlePosX,
        titlePosY: titlePosY,
        titlePathString: titlePathString
    };
};


this.YinYangSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    slicePathString = [helper.MoveToCenter(),
                 helper.ArcTo(r / 2, helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r / 2, 0, 0),
                 helper.Close()];

    titlePosX = helper.getX(helper.startAngle, r / 2);
    titlePosY = helper.getY(helper.startAngle, r / 2);

    titlePathString = [helper.MoveToCenter(),
                 helper.ArcTo(r / 4, helper.startAngle + helper.sliceAngle * 0.2, r * 0.8)];

    return {
        slicePathString: slicePathString,
        linePathString: slicePathString,
        titlePosX: titlePosX,
        titlePosY: titlePosY,
        titlePathString: titlePathString
    };
};


this.WebSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    helper.titleRadius = r * 0.55;
    helper.setTitlePos();

    linePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r * 1.1),
                 helper.MoveToCenter(),
                 helper.LineTo(helper.endAngle, r * 1.1),
                 helper.MoveTo(helper.startAngle, r * 0.15),
                 helper.LineTo(helper.endAngle, r * 0.15),
                 helper.MoveTo(helper.startAngle, r * 0.35),
                 helper.LineTo(helper.endAngle, r * 0.35),
                 helper.MoveTo(helper.startAngle, r * 0.55),
                 helper.LineTo(helper.endAngle, r * 0.55),
                 helper.MoveTo(helper.startAngle, r * 0.75),
                 helper.LineTo(helper.endAngle, r * 0.75),
                 helper.MoveTo(helper.startAngle, r * 0.95),
                 helper.LineTo(helper.endAngle, r * 0.95),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: "",
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.WinterSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.85;
    custom.arcRadiusPercent = 1;
    return custom;
};

this.WinterSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = WinterSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    sliceAngle = helper.sliceAngle;

    parallelAngle = helper.startAngle + sliceAngle / 4;
    parallelAngle2 = helper.startAngle + ((sliceAngle / 4) * 3);
    borderAngle1 = helper.startAngle + (sliceAngle / 200);
    borderAngle2 = helper.startAngle + (sliceAngle / 2) - (sliceAngle / 200);
    borderAngle3 = helper.startAngle + (sliceAngle / 2) + (sliceAngle / 200);
    borderAngle4 = helper.startAngle + sliceAngle - (sliceAngle / 200);

    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;

    slicePathString = [helper.MoveToCenter(),
                 helper.MoveTo(parallelAngle, arcRadius / 100),
                 helper.LineTo(borderAngle1, arcRadius / 2),
                 helper.LineTo(parallelAngle, arcRadius - (arcRadius / 100)),
                 helper.LineTo(borderAngle2, arcRadius / 2),
                 helper.LineTo(parallelAngle, arcRadius / 100),
                 helper.MoveTo(parallelAngle2, arcRadius / 100),
                 helper.LineTo(borderAngle4, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius - (arcRadius / 100)),
                 helper.LineTo(borderAngle3, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius / 100),
                 helper.Close()];

    linePathString = [helper.MoveTo(parallelAngle, arcRadius),
                 helper.LineTo(borderAngle2, arcRadius / 2),
                 helper.MoveTo(borderAngle3, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius)];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


this.TutorialSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.isMoveTo = false;
    custom.isLineTo = false;
    custom.isArcTo = false;
    custom.isArcBackTo = false;
    return custom;
};

this.TutorialSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = TutorialSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    slicePathString = [];
    titlePathString = [];

    slicePathString.push(helper.MoveToCenter());
    titlePathRadius1 = helper.titleRadius;
    titlePathRadius2 = helper.titleRadius;
    titlePathEndangle = helper.startAngle;
    titlePathStartRadius = 0;

    if (custom.isMoveTo === true) {
        slicePathString.push(helper.MoveTo(helper.middleAngle, helper.sliceRadius / 4));
        titlePathRadius1 *= 1.05;
        titlePathRadius2 *= 0.95;
        titlePathStartRadius += helper.sliceRadius / 16;
        titlePathEndangle = helper.startAngle + (helper.sliceAngle / 8);
    }
    if (custom.isLineTo) {
        slicePathString.push(helper.LineTo(helper.startAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.1;
        titlePathRadius2 *= 0.9;
        titlePathStartRadius += helper.sliceRadius / 16;
        titlePathEndangle = helper.startAngle + (helper.sliceAngle / 4);
    }
    if (custom.isArcTo) {
        slicePathString.push(helper.ArcTo(helper.sliceRadius, helper.middleAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.2;
        titlePathRadius2 *= 0.8;
        titlePathStartRadius += helper.sliceRadius / 8;
        titlePathEndangle = helper.middleAngle - (helper.sliceAngle / 8);
    }
    if (custom.isArcBackTo) {
        slicePathString.push(helper.ArcBackTo(helper.sliceRadius, helper.endAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.3;
        titlePathRadius2 *= 0.7;
        titlePathStartRadius += helper.sliceRadius / 8;
        titlePathEndangle = helper.endAngle;
    }
    slicePathString.push(helper.Close());

    titlePathString.push(helper.MoveTo(helper.startAngle, titlePathStartRadius));
    titlePathString.push(helper.CubicBezierTo(helper.middleAngle - (helper.sliceAngle / 8), titlePathRadius1, helper.middleAngle + (helper.sliceAngle / 8), titlePathRadius2, titlePathEndangle, helper.sliceRadius));

    linePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, helper.sliceRadius),
                 helper.ArcTo(helper.sliceRadius, helper.middleAngle, helper.sliceRadius),
                 helper.ArcTo(helper.sliceRadius, helper.endAngle, helper.sliceRadius),
                 helper.Close()];

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};


    return this;
};